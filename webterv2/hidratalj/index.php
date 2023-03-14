<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Főoldal</title>
    <link rel="stylesheet" href="css.css">
    <link rel="icon" type="image/x-icon" href="image/icon.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
<div id="page-container">
    <div id="content-wrap">
<div class="menu">
    <a href="index.php">Főoldal</a>
    <a href="belépés.php">Megrendelés</a>
    <a href="regisztracio.php">Regisztráció</a>
    <a href="belépés.php">Belépés</a>
    <div class="dropdown">
        <button class="dropbtn">Termékek
        <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="Kulacsok.php">Kulacsok</a>
            <a href="Termoszok.php">Termoszok</a>
        </div>

    </div>
    <button href="google.com" class="icon">
            <span class="material-symbols-outlined">
                shopping_cart_checkout
            </span>
    </button>
</div>
    </div>
    </div>


</body>
<footer id="normal-footer"><?php include "./footer.php" ?></footer>

</html>