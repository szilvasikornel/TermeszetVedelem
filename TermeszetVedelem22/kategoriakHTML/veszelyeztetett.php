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

    <h2>Állatok Listája</h2>

    <?php
    // Az adatbázis kapcsolat betöltése
    include '../kapcsolat.php';

    // Az adatbázis kapcsolat
    $dbconn = getDbConnection();

    // SQL lekérdezés az állatok adatainak lekérdezésére
    $sql = "
        SELECT 
            AnimalSpecies.ID as AnimalID,
            AnimalSpecies.CommonName,
            AnimalSpecies.ScientificName,
            AnimalSpecies.Status,
            AnimalSpecies.Class,
            AnimalSpecies.Weight,
            Size.Length,
            Size.Height,
            AnimalSpecies.Diet
        FROM AnimalSpecies
        LEFT JOIN Size ON AnimalSpecies.Size_ID = Size.ID
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
                <th>Common Name</th>
                <th>Scientific Name</th>
                <th>Status</th>
                <th>Class</th>
                <th>Weight</th>
                <th>Length</th>
                <th>Height</th>
                <th>Diet</th>
            </tr>";

    // Adatok kiírása a táblázatba
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . $row['AnimalID'] . "</td>
                    <td>" . $row['CommonName'] . "</td>
                    <td>" . $row['ScientificName'] . "</td>
                    <td>" . $row['Status'] . "</td>
                    <td>" . $row['Class'] . "</td>
                    <td>" . $row['Weight'] . "</td>
                    <td>" . $row['Length'] . "</td>
                    <td>" . $row['Height'] . "</td>
                    <td>" . $row['Diet'] . "</td>
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
