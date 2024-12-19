<?php
// Az adatbázis kapcsolat betöltése
include 'kapcsolat.php';

// Az adatbázis kapcsolat
$dbconn = getDbConnection();

// SQL lekérdezés az állatok adatainak lekérdezésére
$sqlAnimals = "
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

// SQL lekérdezés a területek adatainak lekérdezésére
$sqlTerritories = "
    SELECT 
        Terület.ID as TerületID,
        Helyszín.Ország,
        Helyszín.ÖkológiaiRégió,
        Terület.Típus,
        Terület.VédelmiSzint
    FROM Terület
    LEFT JOIN Helyszín ON Terület.Helyszín_ID = Helyszín.ID
";

// Állatok adatainak lekérdezése
$resultAnimals = mysqli_query($dbconn, $sqlAnimals);
$animals = array();

if ($resultAnimals) {
    while ($row = mysqli_fetch_assoc($resultAnimals)) {
        $animals[] = $row; // Adatok hozzáadása az állatok tömbhöz
    }
} else {
    $animals = null; // Ha nincs adat az állatokhoz
}

// Területek adatainak lekérdezése
$resultTerritories = mysqli_query($dbconn, $sqlTerritories);
$territories = array();

if ($resultTerritories) {
    while ($row = mysqli_fetch_assoc($resultTerritories)) {
        $territories[] = $row; // Adatok hozzáadása a területek tömbhöz
    }
} else {
    $territories = null; // Ha nincs adat a területekhez
}

// JSON válasz visszaadása
header('Content-Type: application/json');
echo json_encode(array(
    'animals' => $animals,
    'territories' => $territories
));

// Kapcsolat lezárása
mysqli_close($dbconn);
?>
