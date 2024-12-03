<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Természetvédelmi Adatbázis</title>
    <link rel="stylesheet" href="../kategoriakCSS/alap.css.php">
    <link rel="stylesheet" href="../kategoriakCSS/teruletek.css">
    <link rel="icon" href="../images/Designer2.ico" type="images/icon.jpg">
</head>
<body>
    <?php include '../mainPHP/header.php'; ?>

    <h2>Területek Listája</h2>

    <?php
    // Az adatbázis kapcsolat betöltése
    include '../kapcsolat.php';

    // Az adatbázis kapcsolat
    $dbconn = getDbConnection();

    // SQL lekérdezés a területek adatainak lekérdezésére
    $sql = "
        SELECT 
            Area.ID as AreaID,
            Location.Country,
            Location.EcologicalRegion,
            Area.Type,
            Area.ProtectionLevel
        FROM Area
        LEFT JOIN Location ON Area.Location_ID = Location.ID
    ";

    // A lekérdezés végrehajtása
    $result = mysqli_query($dbconn, $sql);

    // HTML táblázat megjelenítése
    echo "<table style='margin-bottom: 80px;'>
            <tr>
                <th>ID</th>
                <th>Country</th>
                <th>Ecological Region</th>
                <th>Type</th>
                <th>Protection Level</th>
            </tr>";

    // Adatok kiírása a táblázatba
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . $row['AreaID'] . "</td>
                    <td>" . $row['Country'] . "</td>
                    <td>" . $row['EcologicalRegion'] . "</td>
                    <td>" . $row['Type'] . "</td>
                    <td>" . $row['ProtectionLevel'] . "</td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Nincsenek adatok.</td></tr>";
    }

    echo "</table>";

    // Kapcsolat lezárása
    mysqli_close($dbconn);
    ?>

    <?php include '../mainPHP/footer.php'; ?>

    <script src="../js/script.js"></script>
</body>
</html>
