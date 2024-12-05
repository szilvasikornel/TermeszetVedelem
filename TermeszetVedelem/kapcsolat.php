<?php
define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "");
define("DBNAME", "ecoproject_en");

function getDbConnection() {
    // Adatbázis kapcsolódás
    $dbconn = @mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

    if (!$dbconn) {
        die("Hiba az adatbázis csatlakozásakor: " . mysqli_connect_error());
    }

    // Karakterkódolás beállítása
    mysqli_query($dbconn, "SET NAMES utf8");

    return $dbconn;
}
?>
