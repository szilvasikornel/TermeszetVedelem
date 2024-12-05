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
            Terület.ID as TerületID,
            Helyszín.Ország,
            Helyszín.ÖkológiaiRégió,
            Terület.Típus,
            Terület.VédelmiSzint
        FROM Terület
        LEFT JOIN Helyszín ON Terület.Helyszín_ID = Helyszín.ID
    ";

    // A lekérdezés végrehajtása
    $result = mysqli_query($dbconn, $sql);

    // HTML táblázat megjelenítése
    echo "<table style='margin-bottom: 80px;'>
            <tr>
                <th>ID</th>
                <th>Ország</th>
                <th>Ökológiai Régió</th>
                <th>Típus</th>
                <th>Védelmi Szint</th>
            </tr>";

    // Adatok kiírása a táblázatba
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . $row['TerületID'] . "</td>
                    <td>" . $row['Ország'] . "</td>
                    <td>" . $row['ÖkológiaiRégió'] . "</td>
                    <td>" . $row['Típus'] . "</td>
                    <td>" . $row['VédelmiSzint'] . "</td>
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
