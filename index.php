<?php
session_start();
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Főoldal</title>
    <link rel="stylesheet" href="css.css">
    <link rel="icon" type="image/x-icon" href="image/icon.png">
    <meta name="viewport" content="width=device.width">
</head>
<body>

<div class="menu" id="sticky">
    <a href="index.php" style="background-color: lightgray; color:black">Főoldal</a>
    <?php if(isset($_SESSION["felhasznalo"]) && !empty($_SESSION["felhasznalo"])){?>
        <a href="profilom.php">Profilom</a>
        <a href="kilepes.php">Kijelentkezés</a>
    <?php }else{ ?>
        <a href="belépés.php">Belépés</a>
        <a href="regisztracio.php">Regisztráció</a>
    <?php } ?>
    <div class="dropdown">
        <button class="dropbtn">Termékek
        </button>
        <div class="dropdown-content">
            <a href="Kulacsok.php">Kulacsok</a>
            <a href="Termoszok.php">Termoszok</a>
        </div>
    </div>
    <a href="megrendeles.php"><img src="image/kosar.png" alt="kosar" style="width:30px;height:30px;"></a>
</div>

<img class="image_foo" src="image/fooldal%20kulacs-.jpeg" alt="fooldal_kep" >
<div class="foo_szoveg">
    <p class="p_fooldal">
        Üdvözlünk az oldalunkon ,találd meg álmaid kulacsát vagy termoszát.
    </p>
</div>

<video controls width="400" height="500" class="video">
    <source src="videos/single.mp4"/>
</video>
<footer id="footer"><?php include "./footer.php" ?></footer>
</body>
</html>