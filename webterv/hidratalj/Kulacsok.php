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
        <img src="image/elso_kulacs.jpeg">
    </div>
    <div class="title">
        <h3>Szívárvány</h3>
    </div>
    <div class="description">
        <p>Kulacsaink különböző prémium minőségű agyagokból készültek.</p>Lányoknak és nőknek ajánljuk.</p><strong><h3>3000Ft</h3></strong></p>
        <button>Kosár</button>
    </div>
</div>


              <!-- card -->


<div class="cards">
    <div class="image">
        <img src="image/kulacs.jpeg" width="225px" >
    </div>
    <div class="title">
        <h3>Kékség</h3>
    </div>
    <div class="description">
        <p>Kulacsaink prémium minőségű agyagokból készültek.</p>Lányoknak és nőknek ajánljuk.</br><strong><h3>4000Ft</h3></strong></p>
        <button>Kosár</button>
    </div>
</div>

        <!-- card-->

<div class="cards">
    <div class="image">
        <img src="image/hatodik_kulacs.jpeg">
    </div>
    <div class="title">
        <h3>Cukiság</h3>
    </div>
    <div class="description">
        <p>Kulacsaink prémium minőségű agyagokból készültek.</p>Babáknak ajánljuk.</br><strong><h3>1500Ft</h3></strong></p>
        <button>Kosár</button>
    </div>
</div>

            <!-- card-->

<div class="cards">
    <div class="image">
        <img src="image/negyedik_kulacs.jpeg">
    </div>
    <div class="title">
        <h3>Koala</h3>
    </div>
    <div class="description">
        <p>Kulacsaink prémium minőségű agyagokból készültek.</p>Kisbabáknak ajánljuk.</br><strong><h3>1500Ft</h3></strong></p>
        <button>Kosár</button>
    </div>
</div>

             <!-- card-->

<div class="cards">
    <div class="image">
        <img src="image/otodik_kulacs.jpeg">
    </div>
    <div class="title">
        <h3>Lovacska</h3>
    </div>
    <div class="description">
        <p>Kulacsaink prémium minőségű agyagokból készültek.</p>Kislányoknak ajánljuk.</p><strong><h3>1500Ft</h3></strong></p>
        <button>Kosár</button>
    </div>
</div>

                <!-- card-->

<div class="cards">
    <div class="image">
        <img src="image/utolso_kulacs.jpeg" width="225px" >
    </div>
    <div class="title">
        <h3>Fém kulacs</h3>
    </div>
    <div class="description">
        <p>Kulacsaink prémium minőségű agyagokból készültek.</p>Nőknek és férfiaknak ajánljuk.</p><strong><h3>3000Ft</h3></strong></p>
        <button>Kosár</button>
    </div>
</div>



</body>
<footer id="footer"><?php include "./footer.php" ?></footer>

</html>