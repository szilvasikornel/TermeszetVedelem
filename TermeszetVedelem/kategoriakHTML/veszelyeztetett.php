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
    <div class="button-container">
        <a href="../mainPHP/game.php" class="custom-button">Memória játék</a>
    </div>

    <!-- Állatok táblázata -->
    <div id="animals-table-container">
        <!-- Az állatok táblázata dinamikusan fog megjelenni -->
    </div>

    <?php include '../mainPHP/footer.php'; ?>

    <script src="../js/script.js"></script>
    <script>
        // AJAX kérés az állatok és területek adatainak lekérdezésére
        window.onload = function() {
            fetch('../getdata.php')
                .then(response => response.json())
                .then(data => {
                    // Az állatok táblázatának létrehozása
                    let animalsTableContent = `
                    <table style='margin-bottom: 80px;' border='1' cellpadding='5' cellspacing='0'>
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
                        </tr>`;

                    if (data.animals) {
                        data.animals.forEach(animal => {
                            animalsTableContent += `
                            <tr>
                                <td>${animal.ÁllatID}</td>
                                <td>${animal.KözönségesNév}</td>
                                <td>${animal.TudományosNév}</td>
                                <td>${animal.Állapot}</td>
                                <td>${animal.Osztály}</td>
                                <td>${animal.Súly}</td>
                                <td>${animal.Hossz}</td>
                                <td>${animal.Magasság}</td>
                                <td>${animal.Táplálék}</td>
                            </tr>`;
                        });
                    } else {
                        animalsTableContent += `<tr><td colspan='9'>Nincsenek adatok az állatokhoz.</td></tr>`;
                    }

                    animalsTableContent += `</table>`;
                    document.getElementById('animals-table-container').innerHTML = animalsTableContent;

                    territoriesTableContent += `</table>`;
                    document.getElementById('territories-table-container').innerHTML = territoriesTableContent;
                })
                .catch(error => {
                    console.error('Hiba történt az adatok betöltésekor:', error);
                });
        };
    </script>
</body>
</html>
