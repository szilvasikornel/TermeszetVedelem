<?php
// animals.php

// Az adatbázis kapcsolat betöltése
include('db_connection.php');

// Adatbázis kapcsolat
$dbconn = getDbConnection();

// SQL lekérdezés, amely lekérdezi az állatok adatait
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

// Lekérdezés végrehajtása
$result = mysqli_query($dbconn, $sql);

// HTML táblázat megjelenítése
echo "<table border='1'>
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

// Az adatok kiíratása a táblázatba
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
