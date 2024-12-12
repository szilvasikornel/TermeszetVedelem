<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Természetvédelmi Adatbázis</title>
    <link rel="stylesheet" href="../kategoriakCSS/alap.css.php">
    <link rel="stylesheet" href="../kategoriakCSS/veszelyeztettek.css">
    <link rel="icon" href="../images/Designer2.ico" type="images/icon.jpg">
</head>
<body>
    <?php include '../mainPHP/header.php'; ?>

    <h2 id="h2cim">Állatok Listája</h2>
    <div class="center-container">
        <a class="jatekGomb" href="../mainPHP/game.php">Memória játék</a>
    </div>
    
    <?php
    // Az adatbázis kapcsolat betöltése
    include '../kapcsolat.php';

    // Az adatbázis kapcsolat
    $dbconn = getDbConnection();

    // SQL lekérdezés az állatok adatainak lekérdezésére
    $sql = "
        SELECT 
            ÁllatFajok.ID as ÁllatID,
            ÁllatFajok.KözönségesNév,
            ÁllatFajok.TudományosNév,
            ÁllatFajok.Állapot,
            ÁllatFajok.Osztály,
            ÁllatFajok.Súly,
            Méret.Hossz,
            Méret.Magasság,
            ÁllatFajok.Táplálék
        FROM ÁllatFajok
        LEFT JOIN Méret ON ÁllatFajok.Méret_ID = Méret.ID
    ";

    // A lekérdezés végrehajtása és ellenőrzése
    $result = mysqli_query($dbconn, $sql);

    // Ellenőrizzük, hogy sikerült-e a lekérdezés
    if (!$result) {
        die("Hiba a lekérdezés végrehajtásakor: " . mysqli_error($dbconn));
    }

    // HTML táblázat megjelenítése
    echo "<table style='margin-bottom: 80px;' border='1' cellpadding='5' cellspacing='0'>
            <tr>
                <th>ID</th>
                <th>Közönséges Név</th>
                <th>Tudományos Név</th>
                <th>Állapot</th>
                <th>Osztály</th>
                <th>Súly</th>
                <th>Hossz</th>
                <th>Magasság</th>
                <th>Táplálék</th>
            </tr>";

    // Adatok kiírása a táblázatba
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . $row['ÁllatID'] . "</td>
                    <td>" . $row['KözönségesNév'] . "</td>
                    <td>" . $row['TudományosNév'] . "</td>
                    <td>" . $row['Állapot'] . "</td>
                    <td>" . $row['Osztály'] . "</td>
                    <td>" . $row['Súly'] . "</td>
                    <td>" . $row['Hossz'] . "</td>
                    <td>" . $row['Magasság'] . "</td>
                    <td>" . $row['Táplálék'] . "</td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='9'>Nincsenek adatok.</td></tr>";
    }

    echo "</table>";

    // Kapcsolat lezárása
    mysqli_close($dbconn);
    ?>

    <?php include '../mainPHP/footer.php'; ?>

    <script src="../js/script.js"></script>
</body>
</html>
