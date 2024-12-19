<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Természetvédelmi Adatbázis</title>
    <link rel="stylesheet" href="mainCSS/main.css">
    <link rel="icon" href="images/Designer2.ico" type="image/x-icon">
</head>
<body>
    <?php include 'mainPHP/header2.php'; ?> 

    <!-- Kezdőlap szakasz -->
    <div class="container">
    
        <div id="kezdolap" class="mainContent">
            <div class="intro-text">
                <h2 id="udvozlo">Üdvözöljük a Természetvédelmi Adatbázisban!</h2>
                <hr>
                <p class="szoveg page" id="page1">Az adatbázis célja, hogy átfogó és folyamatosan frissülő nyilvántartást biztosítson a különböző veszélyeztetett fajok, természetvédelmi területek és az ezekhez kapcsolódó élővilág állapotáról. A rendszer részletes információkat tartalmaz minden egyes faj természetvédelmi státuszáról, élőhelyeiről, és az esetleges fenyegetettségükről. Az adatbázis segít a tudósoknak, szakembereknek, és a természetvédelmi szervezeteknek abban, hogy nyomon követhessék a fajok populációinak változásait, és megfelelő intézkedéseket hozhassanak a megóvásuk érdekében. Ezen kívül, a rendszer hozzájárul a környezeti hatások alaposabb megértéséhez, figyelembe véve a globális és helyi ökológiai változásokat, amelyek hatással vannak a biológiai sokféleség megőrzésére.</p>

                <p class="szoveg page" id="page2">A projekt elsődleges célja, hogy felhívja a figyelmet a természetvédelem fontosságára, és hangsúlyozza az ökológiai egyensúly fenntartásának szerepét a hosszú távú környezeti stabilitás biztosításában. Az adatbázis egyedülálló módon olyan átfogó képet ad a természeti erőforrások állapotáról, amely segít a közönség számára is elérhetővé tenni azokat az információkat, amelyek a környezetvédelmi problémák megértéséhez és kezeléséhez szükségesek. Az adatbázis folyamatosan bővülő adatokat tartalmaz a veszélyeztetett területek, védett fajok, ökológiai korlátozások és természetvédelmi szabályozások terén, ezzel is elősegítve a tudatosabb környezetvédelem gyakorlati megvalósítását.</p>

                <p class="szoveg page" id="page3">A projekt célja, hogy az információk szélesebb körben elérhetők legyenek, ezzel támogatva a helyi közösségek és döntéshozók munkáját a fenntartható fejlődés előmozdításában. A természetvédelem egyik alapvető pillére a tudatos hozzáállás és a közösségi részvétel, amelyre az adatbázis segítségével lehetőséget biztosítunk. Az adatbázis fejlesztése során külön figyelmet fordítunk arra, hogy minél szélesebb körben elérhetővé váljanak azok a tudományos és közérthető adatok, amelyek lehetővé teszik a természetvédelmi stratégiák, kutatások és megoldások hatékony alkalmazását a jövőben. Az adatbázis az oktatásban, kutatásban, valamint a természetvédelmi politikák kialakításában is szerepet kap, segítve a jövő generációit abban, hogy tudatos döntéseket hozzanak a bolygó megóvása érdekében.</p>

                <!-- Pagination -->
                <div class="pagination">
                <button class="prev" onclick="changePage(-1)">Előző</button>
                <span class="page-number" id="page-number">1/3</span>
                <button class="next" onclick="changePage(1)">Következő</button>
                </div>
            </div>
            <div class="background-overlay"></div>
        </div>

        <!-- Kártyák elrendezése: Veszélyeztetett Fajok, Természetvédelmi Területek, Élővilág Állapota -->
        <div class="card-container">
            <!-- Veszélyeztetett Fajok Kártya -->
            <a href="kategoriakHTML/veszelyeztetett.php">
                <div id="veszelyeztetett" class="card">
                    <h3>Állatok</h3>
                    <div class="card-content">
                        <img src="images/card1.jpg" alt="Veszélyeztetett fajok">
                        <p><strong>Veszélyeztetett fajok</strong> globálisan kiemelt védelmet igényelnek, mivel a biodiverzitás csökkenése miatt a kihalás veszélye fenyegeti őket. A védelmük mindenki számára kulcsfontosságú feladat.</p>
                    </div>
                </div>
            </a>

            <!-- Természetvédelmi Területek Kártya -->
            <a href="kategoriakHTML/teruletek.php">
                <div id="teruletek" class="card">
                    <h3>Területek</h3>
                    <div class="card-content">
                        <img src="images/card2.jpg" alt="Természetvédelmi terület">
                        <p><strong>A természetvédelmi területek</strong> szerepe kulcsfontosságú a biodiverzitás fenntartásában. Védelmük biztosítja az élőhelyeket a veszélyeztetett fajok számára, ezáltal megőrzi az ökoszisztémák egészségét.</p>
                    </div>
                </div>
            </a>

            <!-- Élővilág Állapota Kártya -->
            <a href="kategoriakHTML/allapot.php">
                <div id="allapot-container" class="allapot-container">
                    <div id="allapot" class="card">
                        <h3>Élővilág</h3>
                        <div class="card-content">
                            <img src="images/card3.jpg" alt="Ökológiai egyensúly">
                            <p><strong>Az élővilág állapotának figyelemmel kísérése</strong> elengedhetetlen a sikeres természetvédelmi programok számára. A monitorozás segíti az ökológiai egyensúly megőrzését és a védelmi intézkedések célzott alkalmazását.</p>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Fenntarthatósági Kezdeményezések Kártya -->
            <a href="kategoriakHTML/fenntarthatosag.php">
                <div id="fenntarthatosag" class="card">
                    <h3>Fenntarthatóság</h3>
                    <div class="card-content">
                        <img src="images/card4.jpg" alt="Fenntarthatóság">
                        <p><strong>Fenntarthatósági kezdeményezések</strong> világszerte segítenek csökkenteni az ökológiai lábnyomot, megóvni a természetet, és fenntartani a gazdasági és társadalmi egyensúlyt.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>  


    <?php include 'mainPHP/footer.php'; ?>
    <script src="js/script.js"></script>
    <script src="js/page.js"></script>
</body>
</html>
