<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ökolábnyom Kalkulátor</title>
    <link rel="stylesheet" href="../mainCSS/labnyom.css">
    <link rel="icon" href="../images/Designer2.ico" type="image/x-icon">
</head>
<body>
    <?php include '../mainPHP/header.php'; ?>
    <div class="kalkulator">
        <div class="container">
            <h1 id="labnyom">Ökolábnyom Kalkulátor</h1>
            <form id="footprint-form">
                <label for="electricity">Hány kWh áramot fogyaszt egy hónapban?</label>
                <select id="electricity">
                    <option value="100">100 kWh</option>
                    <option value="200">200 kWh</option>
                    <option value="300">300 kWh</option>
                    <option value="400">400 kWh</option>
                    <option value="500">500 kWh</option>
                </select>

                <label for="car">Hány kilométert vezet egy hónapban autóval?</label>
                <select id="car">
                    <option value="100">100 km</option>
                    <option value="200">200 km</option>
                    <option value="300">300 km</option>
                    <option value="400">400 km</option>
                    <option value="500">500 km</option>
                </select>

                <label for="meat">Hány adag húst fogyaszt egy héten?</label>
                <select id="meat">
                    <option value="1">1 adag</option>
                    <option value="2">2 adag</option>
                    <option value="3">3 adag</option>
                    <option value="4">4 adag</option>
                    <option value="5">5 adag</option>
                </select>

                <label for="flights">Milyen gyakran utazik repülővel évente?</label>
                <select id="flights">
                    <option value="1">1 alkalom</option>
                    <option value="2">2 alkalom</option>
                    <option value="3">3 alkalom</option>
                    <option value="4">4 alkalom</option>
                    <option value="5">5 alkalom</option>
                </select>

                <div class="button-container">
                    <a href="javascript:history.back()" class="back-button">← Vissza</a>
                    <button type="submit" class="calculate-button">Kiszámít</button>
                </div>
            </form>

            <div id="result" class="hidden">
                <h2>Ökolábnyoma:</h2>
                <p id="footprint-value"></p>
            </div>
        </div>
    </div>
    <?php include '../mainPHP/footer.php'; ?>
    <script src="../js/labnyom.js"></script>
</body>
</html>
