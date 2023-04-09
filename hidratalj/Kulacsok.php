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
        <img src="image/elso_kulacs.jpeg" alt="elso_kulacs">
    </div>
    <div class="title">
        <h3>Szivárvány</h3>
    </div>
    <div class="description">
        <p>Kulacsaink különböző prémium minőségű agyagokból készültek.</p><p>Lányoknak és nőknek ajánljuk.</p><br><p><strong>3000Ft</strong></p>
        <button>Kosár</button>
    </div>
</div>


              <!-- card -->


<div class="cards">
    <div class="image">
        <img src="image/kulacs.jpeg" alt="kulacs" width="225" >
    </div>
    <div class="title">
        <h3>Kékség</h3>
    </div>
    <div class="description">
        <p>Kulacsaink prémium minőségű agyagokból készültek.</p><p>Lányoknak és nőknek ajánljuk.</p><br><p><strong>4000Ft</strong></p>
        <button>Kosár</button>
    </div>
</div>

        <!-- card-->

<div class="cards">
    <div class="image">
        <img src="image/hatodik_kulacs.jpeg" alt="hatodik_kulacs">
    </div>
    <div class="title">
        <h3>Cukiság</h3>
    </div>
    <div class="description">
        <p>Kulacsaink prémium minőségű agyagokból készültek.</p><p>Babáknak ajánljuk.</p><br><p><strong>1500Ft</strong></p>
        <button>Kosár</button>
    </div>
</div>

            <!-- card-->

<div class="cards">
    <div class="image">
        <img src="image/negyedik_kulacs.jpeg" alt="negyedik_kulacs">
    </div>
    <div class="title">
        <h3>Koala</h3>
    </div>
    <div class="description">
        <p>Kulacsaink prémium minőségű agyagokból készültek.</p><p>Kisbabáknak ajánljuk.</p><br><p><strong>1500Ft</strong></p>
        <button>Kosár</button>
    </div>
</div>

             <!-- card-->

<div class="cards">
    <div class="image">
        <img src="image/otodik_kulacs.jpeg" alt="otodik_kulacs">
    </div>
    <div class="title">
        <h3>Lovacska</h3>
    </div>
    <div class="description">
        <p>Kulacsaink prémium minőségű agyagokból készültek.</p><p>Kislányoknak ajánljuk.</p><br><p><strong>1500Ft</strong></p>
        <button>Kosár</button>
    </div>
</div>

                <!-- card-->

<div class="cards">
    <div class="image">
        <img src="image/utolso_kulacs.jpeg" alt="utolso_kulacs" width="225" >
    </div>
    <div class="title">
        <h3>Fém kulacs</h3>
    </div>
    <div class="description">
        <p>Kulacsaink prémium minőségű agyagokból készültek.</p><p>Nőknek és férfiaknak ajánljuk.</p><br><p><strong>3000Ft</strong></p>
        <button>Kosár</button>
    </div>
</div>
</div>

<footer id="footer"><?php include "./footer.php" ?></footer>
</body>
</html>