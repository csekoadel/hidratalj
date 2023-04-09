<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Kulacsok</title>
    <link rel="stylesheet" href="css.css">
    <link rel="icon" type="image/x-icon" href="image/icon.png">
    <meta name="viewport" content="width=device.width">
</head>
<body>
<div class="menu" id="sticky">
    <a href="index.php">Főoldal</a>
    <?php if(isset($_SESSION["felhasznalo"]) && !empty($_SESSION["felhasznalo"])){?>
        <a href="belépés.php">Belépés</a>
        <a href="regisztracio.php">Regisztráció</a>
    <?php }else{ ?>
        <a href="profilom.php">Profilom</a>
        <a href="kilepes.php">Kijelentkezés</a>
    <?php } ?>
    <div class="dropdown">
        <button class="dropbtn" style="background-color: lightgray; color: black">Termékek
        </button>
        <div class="dropdown-content">
            <a href="Kulacsok.php">Kulacsok</a>
            <a href="Termoszok.php">Termoszok</a>
        </div>
    </div>
    <a href="megrendeles.php"><img src="image/kosar.png" alt="kosar" style="width:30px;height:30px;"></a>
</div>

<div class="main">
    <div class="cards">
        <div class="image">
            <img src="image/elso_termosz.jpeg" alt="elso_termosz">
        </div>
        <div class="title">
            <h3>Fém kulacs</h3>
        </div>
        <div class="description">
            <p>Termoszaink különböző minőségű anyagokból készültek.</p>
            <p>Idősebb felnőtteknek ajánljuk.</p><br>
            <p><strong>5000Ft</strong></p>
            <button>Kosár</button>
        </div>
    </div>


    <!-- card -->


    <div class="cards">
        <div class="image">
            <img src="image/masodik_termosz.jpeg" alt="masodik_termosz" width="225">
        </div>
        <div class="title">
            <h3>Átmenetes termosz</h3>
        </div>
        <div class="description">
            <p>Termoszaink különböző minőségű anyagokból készültek.</p>
            <p>Idősebb férfiaknak felnőtteknek ajánljuk.</p><br>
            <p><strong>3000Ft</strong></p>
            <button>Kosár</button>
        </div>
    </div>

    <!-- card-->

    <div class="cards">
        <div class="image">
            <img src="image/negyedik_termosz.jpeg" alt="negyedik_termosz">
        </div>
        <div class="title">
            <h3>Unikornis</h3>
        </div>
        <div class="description">
            <p>Termoszaink különböző minőségű anyagokból készültek.</p>
            <p>Ovisoknak ajánljuk.</p><br>
            <p><strong>1500Ft</strong></p>
            <button>Kosár</button>
        </div>
    </div>

    <!-- card-->

    <div class="cards">
        <div class="image">
            <img src="image/hatodik_termosz.jpeg" alt="hatodik_termosz">
        </div>
        <div class="title">
            <h3>Virág</h3>
        </div>
        <div class="description">
            <p>Termoszaink különböző minőségű anyagokból készültek.</p>
            <p>Anyukáknak ajánljuk.</p><br>
            <p>
            <p><strong>6000Ft</strong></p>
            <button>Kosár</button>
        </div>
    </div>

    <!-- card-->

    <div class="cards">
        <div class="image">
            <img src="image/nyolcadik_termosz.jpeg" alt="nyolcadik_termosz">
        </div>
        <div class="title">
            <h3>Cukiság</h3>
        </div>
        <div class="description">
            <p>Termoszaink különböző minőségű anyagokból készültek.</p>
            <p>Idősebb felnőtteknek ajánljuk.</p><br>
            <p><strong>4000Ft</strong></p>
            <button>Kosár</button>
        </div>
    </div>

    <!-- card-->

    <div class="cards">
        <div class="image">
            <img src="image/otodik_termosz.jpeg" alt="otodik_termosz" width="225">
        </div>
        <div class="title">
            <h3>Fa termosz</h3>
        </div>
        <div class="description">
            <p>Termoszaink különböző minőségű anyagokból készültek.</p>
            <p>Idősebb felnőtteknek ajánljuk.</p><br>
            <p><strong>5000Ft</strong></p>
            <button>Kosár</button>
        </div>
    </div>


</div>

<footer id="footer">
    <?php include("footer.php"); ?>
</footer>
</body>
</html>