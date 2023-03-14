<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Belépés</title>
    <link rel="stylesheet" href="css.css">
    <link rel="icon" type="image/x-icon" href="image/icon.png">
</head>
<body>
<div class="menu">
    <a href="index.php">Főoldal</a>
    <a href="belépés.php">Megrendelés</a>
    <a href="regisztracio.php">Regisztráció</a>
    <a href="belépés.php">Belépés</a>
    <div class="dropdown">
        <button class="dropbtn">Termékek
            <i class="nemtom"></i>
        </button>
        <div class="dropdown-content">
            <a href="Kulacsok.php">Kulacsok</a>
            <a href="Termoszok.php">Termoszok</a>
        </div>

    </div>
</div>

    <div>
    <form method="POST">
        <fieldset>
            <legend>Bejelentkezés</legend>
            <label for="email">E-mail cím:</label>
            <input type="email" id="email" name="email" required/> <br/><br/>
            <label for="jelszo">Jelszó:</label>
            <input type="password" id="jelszo" name="jelszo" required/> <br/><br/>
        </fieldset>
        <br><br>
        <input type="submit" id="bejelentkezes" value="Bejelentkezés"/>

    </form>
    </div>

</body>
<?php include "./footer.php" ?>
</html>