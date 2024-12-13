<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Természetvédelmi Adatbázis - Területek</title>
    <link rel="stylesheet" href="../kategoriakCSS/alap.css.php">
    <link rel="stylesheet" href="../kategoriakCSS/teruletek.css">
    <link rel="icon" href="../images/Designer2.ico" type="images/icon.jpg">
</head>
<body>
    <?php include '../mainPHP/header.php'; ?>

    <h2 id="h2cim">Területek Listája</h2>

    <!-- Területek táblázata -->
    <div id="territories-table-container">
        <!-- A területek táblázata dinamikusan fog megjelenni -->
    </div>

    <?php include '../mainPHP/footer.php'; ?>

    <script src="../js/script.js"></script>
    <script>
        // AJAX kérés a területek adatainak lekérdezésére
        window.onload = function() {
            fetch('../getdata.php')
                .then(response => response.json())
                .then(data => {
                    // A területek táblázatának létrehozása
                    let territoriesTableContent = `
                    <table style='margin-bottom: 80px;' border='1' cellpadding='5' cellspacing='0'>
                        <tr>
                            <th>ID</th>
                            <th>Ország</th>
                            <th>Ökológiai Régió</th>
                            <th>Típus</th>
                            <th>Védelmi Szint</th>
                        </tr>`;

                    if (data.territories) {
                        data.territories.forEach(territory => {
                            territoriesTableContent += `
                            <tr>
                                <td>${territory.TerületID}</td>
                                <td>${territory.Ország}</td>
                                <td>${territory.ÖkológiaiRégió}</td>
                                <td>${territory.Típus}</td>
                                <td>${territory.VédelmiSzint}</td>
                            </tr>`;
                        });
                    } else {
                        territoriesTableContent += `<tr><td colspan='5'>Nincsenek adatok a területekhez.</td></tr>`;
                    }

                    territoriesTableContent += `</table>`;
                    document.getElementById('territories-table-container').innerHTML = territoriesTableContent;
                })
                .catch(error => {
                    console.error('Hiba történt a területek adatok betöltésekor:', error);
                });
        };
    </script>
</body>
</html>
