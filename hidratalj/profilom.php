<?php
session_start();




function nemet_konvertal($betujel) {		// egy segédfüggvény, amely visszaadja a betűjelnek megfelelő nemet
    switch ($betujel) {
        case "ferfi" : return "férfi";break;
        case "no" : return "nő"; break;
        case "egyeb" : return "egyéb"; break;
    }
}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Profilom</title>
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
        <a href="profilom.php" class="active" style="background-color: lightgray; color: black">Profilom</a>
        <a href="kilepes.php">Kijelentkezés</a>
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

<section id="content">
    <h2>Profilom</h2>
    <hr/>

<?php
// profiladatok kilistázása
echo "<ul class='profil'>";
echo "<li>Teljes név: " . $_SESSION["felhasznalo"]["nev"] . "</li>";
echo "<li>Email: " . $_SESSION["felhasznalo"]["email"] . "</li>";
echo "<li>Telefon: " . $_SESSION["felhasznalo"]["tel"] . "</li>";
echo "<li>Nem: " . nemet_konvertal($_SESSION["felhasznalo"]["nem"]) . "</li>";
echo "<li>Város: " . $_SESSION["felhasznalo"]["varos"] . "</li>";
echo "<li>Irányítószám: " . $_SESSION["felhasznalo"]["iranyitoszam"] . "</li>";
echo "<li>Közterület típusa: " . $_SESSION["felhasznalo"]["kozterulet"] . "</li>";
echo "<li>Irányítószám: " . $_SESSION["felhasznalo"]["hazszam"] . "</li>";
echo "</ul>";
?>
</section>
<footer id="footer"><?php include "./footer.php" ?></footer>
</body>
</html>
