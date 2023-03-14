<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Regisztráció</title>
    <link rel="stylesheet" href="css.css">
    <link rel="icon" type="image/x-icon" href="image/icon.png">

</head>
<body>
<article>
<header>
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
</div>

</header>
<main>
<div>
<form method="POST">
    <fieldset>
        <legend>Regisztrációs adatok</legend>
        <label for="nev">Teljes név:</label>
        <input type="text" id="nev" name="nev" required/> <br/><br/>
        <label for="email">E-mail cím:</label>
        <input type="email" id="email" name="email" required/> <br/><br/>
        <label for="tel">Telefonszám:</label>
        <input type="tel" id="tel" name="tel" required/> <br/>
        <p>Nem:</p>
        <label for="egyeb">Egyéb:</label>
        <input type="radio" id="egyeb" name="nem" value="egyeb" checked/>
        <label for="ferfi">Férfi:</label>
        <input type="radio" id="ferfi" name="nem" value="ferfi"/>
        <label for="no">Nő:</label>
        <input type="radio" id="no" name="nem" value="no"/> <br><br>
        <label for="jelszo">Jelszó:</label>
        <input type="password" id="jelszo" name="jelszo" required/> <br/><br/>

    </fieldset>
    <br><br>
    <fieldset class="buttons">
        <legend>Számlázási cím</legend>
        <label for="varos">Város:</label>
        <input type="text" id="varos" name="varos" required/>
        <label for="iranyitoszam">Irányítószám:</label>
        <input type="number" id="iranyitoszam" name="iranyitoszam" required/> <br><br>
        <label for="kozterulet">Közterület és típusa:</label>
        <input type="text" id="kozterulet" name="kozterulet" required/><br><br>
        <label for="hazszam">Házszám:</label>
        <input type="number" id="hazszam" name="hazszam" required/>
    </fieldset>
    <br><br>
    <input type="submit" id="kuldes" value="Küldés"/>
    <input type="reset"  id="reset" value="Visszaállítás"/>

</form>
</div>

</main>
<footer>
    <?php include_once "./footer.php" ?>
</footer>

</article>
</body>

</html>

