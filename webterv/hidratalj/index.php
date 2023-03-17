<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Főoldal</title>
    <link rel="stylesheet" href="css.css">
    <link rel="icon" type="image/x-icon" href="image/icon.png">
    <meta name="viewport" content="width=device.width" initial-scale="1.0">
</head>
<body>
<div id="page-container">
    <div id="content-wrap">
<div class="menu" id="sticky">
    <a href="index.php" style="background-color: lightgray color:black" >Főoldal</a>
    <a href="regisztracio.php">Regisztráció</a>
    <a href="belépés.php">Belépés</a>
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
<video controls width="400px" height="500px" class="video">
    <source src="videos/single.mp4"/>
</video>
</body>
</html>
<footer id="footer"><?php include "./footer.php" ?></footer>