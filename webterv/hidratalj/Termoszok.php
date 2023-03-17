<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Kulacsok</title>
    <link rel="stylesheet" href="css.css">
    <link rel="icon" type="image/x-icon" href="image/icon.png">
    <meta name="viewport" content="width=device.width" initial-scale="1.0">
</head>
<body>
<div class="menu" id="sticky">
    <a href="index.php">Főoldal</a>
    <a href="regisztracio.php">Regisztráció</a>
    <a href="belépés.php">Belépés</a>
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
            <img src="image/elso_termosz.jpeg">
        </div>
        <div class="title">
            <h3>Fém kulacs</h3>
        </div>
        <div class="description">
            <p>Termoszaink különböző minőségű anyagokból készültek.</p>Idősebb felnőtteknek ajánljuk.</p><strong><h3>5000Ft</h3></strong></p>
            <button>Kosár</button>
        </div>
    </div>


    <!-- card -->


    <div class="cards">
        <div class="image">
            <img src="image/masodik_termosz.jpeg" width="225px" >
        </div>
        <div class="title">
            <h3>Átmenetes termosz</h3>
        </div>
        <div class="description">
            <p>Termoszaink különböző minőségű anyagokból készültek.</p>Idősebb férfiaknak felnőtteknek ajánljuk.</br><strong><h3>3000Ft</h3></strong></p>
            <button>Kosár</button>
        </div>
    </div>

    <!-- card-->

    <div class="cards">
        <div class="image">
            <img src="image/negyedik_termosz.jpeg">
        </div>
        <div class="title">
            <h3>Unikornis</h3>
        </div>
        <div class="description">
            <p>Termoszaink különböző minőségű anyagokból készültek.</p>Ovisoknak ajánljuk.</br><strong><h3>1500Ft</h3></strong></p>
            <button>Kosár</button>
        </div>
    </div>

    <!-- card-->

    <div class="cards">
        <div class="image">
            <img src="image/hatodik_termosz.jpeg">
        </div>
        <div class="title">
            <h3>Virág</h3>
        </div>
        <div class="description">
            <p>Termoszaink különböző minőségű anyagokból készültek.</p>Anyukáknak ajánljuk.</br><strong><h3>6000Ft</h3></strong></p>
            <button>Kosár</button>
        </div>
    </div>

    <!-- card-->

    <div class="cards">
        <div class="image">
            <img src="image/nyolcadik_termosz.jpeg">
        </div>
        <div class="title">
            <h3>Cukiság</h3>
        </div>
        <div class="description">
            <p>Termoszaink különböző minőségű anyagokból készültek.</p>Idősebb felnőtteknek ajánljuk.</p><strong><h3>4000Ft</h3></strong></p>
            <button>Kosár</button>
        </div>
    </div>

    <!-- card-->

    <div class="cards">
        <div class="image">
            <img src="image/otodik_termosz.jpeg" width="225px" >
        </div>
        <div class="title">
            <h3>Fa termosz</h3>
        </div>
        <div class="description">
            <p>Termoszaink különböző minőségű anyagokból készültek.</p>Idősebb felnőtteknek ajánljuk.</p><strong><h3>5000Ft</h3></strong></p>
            <button>Kosár</button>
        </div>
    </div>



</body>
<footer id="footer"><?php include "./footer.php" ?></footer>

</html>