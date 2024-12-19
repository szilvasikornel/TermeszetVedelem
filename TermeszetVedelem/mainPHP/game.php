<?php
session_start();

// Reset the game if "reset" is clicked
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reset'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Initialize the game
if (!isset($_SESSION['cards'])) {
    $animals = [
        'Panda' => '../images/memoria/panda.jpg',
        'Tiger' => '../images/memoria/images.jpg',
        'Elephant' => '../images/memoria/1033551-elephant.jpg',
        'Rhino' => '../images/memoria/3yuabfu3jq_white_rhino_42993643.jpg',
        'Turtle' => '../images/memoria/hawksbill_sea_turtle.jpg',
        'Penguin' => '../images/memoria/pinguin.jpg',
    ];    

    $names = array_keys($animals);
    $images = array_values($animals);

    // Shuffle the cards, mixing names and images
    $cards = array_merge($names, $images); 
    shuffle($cards);

    $_SESSION['cards'] = $cards;
    $_SESSION['flipped'] = [];
    $_SESSION['matched'] = [];
}

// Handle card flip
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['card_index'])) {
    $index = (int)$_POST['card_index'];

    if (!in_array($index, $_SESSION['flipped']) && !in_array($index, $_SESSION['matched'])) {
        $_SESSION['flipped'][] = $index;

        // Check for match if two cards are flipped
        if (count($_SESSION['flipped']) === 2) {
            $first = $_SESSION['flipped'][0];
            $second = $_SESSION['flipped'][1];

            $firstCard = $_SESSION['cards'][$first];
            $secondCard = $_SESSION['cards'][$second];

            // Check for matching pairs (name and corresponding image)
            $animals = [
                'Panda' => '../images/memoria/panda.jpg',
                'Tiger' => '../images/memoria/images.jpg',
                'Elephant' => '../images/memoria/1033551-elephant.jpg',
                'Rhino' => '../images/memoria/3yuabfu3jq_white_rhino_42993643.jpg',
                'Turtle' => '../images/memoria/hawksbill_sea_turtle.jpg',
                'Penguin' => '../images/memoria/pinguin.jpg',
            ];

            // Check for matching pairs (name and corresponding image)
            if ((isset($animals[$firstCard]) && $animals[$firstCard] === $secondCard) ||
                (isset($animals[$secondCard]) && $animals[$secondCard] === $firstCard)) {
                $_SESSION['matched'] = array_merge($_SESSION['matched'], $_SESSION['flipped']);
            }

            // Reset flipped cards after the game logic
            $_SESSION['flipped'] = [];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memória játék</title>
    <link rel="stylesheet" href="../kategoriakCSS/alap.css.php">
    <link rel="stylesheet" href="../mainCSS/game.css">
</head>
<body>
    <?php include '../mainPHP/header.php'; ?>
    <div class="container">
        <div class="alap">
            <h1>Veszélyeztetett állatok memória játéka</h1>
            <h4 class="szoveg">Párosítsd a képeket a hozzájuk tartozó nevekkel!</h4>
            <form method="post">
                <div class="grid">
                    <?php foreach ($_SESSION['cards'] as $index => $card): ?>
                        <button type="submit" name="card_index" value="<?= $index ?>"
                                class="card <?= in_array($index, $_SESSION['matched']) ? 'matched' : '' ?>"
                                <?= in_array($index, $_SESSION['matched']) ? 'disabled' : '' ?>>
                            <?php if (in_array($index, $_SESSION['flipped']) || in_array($index, $_SESSION['matched'])): ?>
                                <?php if (str_ends_with($card, '.jpg') || str_ends_with($card, '.JPG')): ?>
                                    <img src="<?= $card ?>" alt="Image of <?= $card ?>">
                                <?php else: ?>
                                    <?= $card ?>
                                <?php endif; ?>
                            <?php else: ?>
                                ?
                            <?php endif; ?>
                        </button>
                    <?php endforeach; ?>
                </div>

                <!-- Gombok, amelyek akkor jelennek meg, ha a játék befejeződött -->
                <div class="actions">
                    <?php if (count($_SESSION['matched']) === count($_SESSION['cards'])): ?>
                        <button type="submit" name="reset">Újraindítás</button>
                    <?php endif; ?>
                </div>
            </form>

            <?php if (count($_SESSION['matched']) === count($_SESSION['cards'])): ?>
                <h2 class="szoveg">Szép munka! Minden állatot összepárosított!</h2>
            <?php endif; ?>
        </div>
    </div>
    <?php include '../mainPHP/footer.php'; ?> 
</body>
</html>
