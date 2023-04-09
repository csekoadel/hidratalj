<?php
session_start();
include "mindegyik.php";              // beágyazzuk a loadUsers() és saveUsers() függvényeket tartalmazó PHP fájlt
$fiokok = betoltott_felhasznalok("felhasznalok.txt"); // betöltjük a regisztrált felhasználók adatait, és eltároljuk őket a $fiokok változóban

// az űrlapfeldolgozás során keletkező hibákat ebbe a tömbbe fogjuk gyűjteni
$hibak = [];

// űrlapfeldolgozás

if (isset($_POST["regisztracio"])) {   // ha az űrlapot elküldték...
    // a kötelezően kitöltendő mezők ellenőrzése
    if (!isset($_POST["nev"]) || trim($_POST["nev"]) === "")
        $hibak[] = "A teljes név megadása kötelező!";

    if (!isset($_POST["email"]) || trim($_POST["email"]) === "")
        $hibak[] = "A email megadása kötelező!";

    if (!isset($_POST["tel"]) || trim($_POST["tel"]) === "")
        $hibak[] = "A telefon megadása kötelező!";

    if (!isset($_POST["nem"]) || trim($_POST["nem"]) === "")
        $hibak[] = "A nem megadása kötelező!";

    if (!isset($_POST["jelszo"]) || trim($_POST["jelszo"]) === "" || !isset($_POST["jelszo2"]) || trim($_POST["jelszo2"]) === "")
        $hibak[] = "A jelszó és az ellenőrző jelszó megadása kötelező!";

    if (!isset($_POST["varos"]) || trim($_POST["varos"]) === "")
        $hibak[] = "A város megadása kötelező!";

    if (!isset($_POST["iranyitoszam"]) || trim($_POST["iranyitoszam"]) === "")
        $hibak[] = "Az irányítószám megadása kötelező!";

    if (!isset($_POST["kozterulet"]) || trim($_POST["kozterulet"]) === "")
        $hibak[] = "A közterület típusának megadása kötelező!";

    if (!isset($_POST["hazszam"]) || trim($_POST["hazszam"]) === "")
        $hibak[] = "A házszám megadása kötelező!";

    // űrlapadatok lementése változókba
    $nev = $_POST["nev"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];
    $nem = NULL;
    $jelszo = $_POST["jelszo"];
    $jelszo2 = $_POST["jelszo2"];
    $varos = $_POST["varos"];
    $iranyitoszam = $_POST["iranyitoszam"];
    $kozterulet_tipusa = $_POST["kozterulet"];
    $hazszam = $_POST["hazszam"];


    if (isset($_POST["nem"]))           // csak akkor kérjük le a nemet, ha megadták
        $nem = $_POST["nem"];

    // foglalt email ellenőrzése
    foreach ($fiokok as $fiok) {
        if ($fiok["email"] === $email)  // ha egy regisztrált felhasználó neve megegyezik az űrlapon megadott névvel...
            $hibak[] = "Az email már foglalt!";
    }

    // túl rövid jelszó
    if (strlen($jelszo) < 5)
        $hibak[] = "A jelszónak legalább 5 karakter hosszúnak kell lennie!";

    // a két jelszó nem egyezik
    if ($jelszo !== $jelszo2)
        $hibak[] = "A jelszó és az ellenőrző jelszó nem egyezik!";


    if (count($hibak) === 0) {
        $jelszo = password_hash($jelszo, PASSWORD_DEFAULT);
        $fiokok[] = ["nev" => $nev, "email" => $email, "tel" => $tel, "nem" => $nem, "jelszo" => $jelszo, "varos" => $varos, "iranyitoszam" => $iranyitoszam, "kozterulet" => $kozterulet_tipusa, "hazszam" => $hazszam];
        mentett_felhasznalok("felhasznalok.txt", $fiokok);
        $siker = TRUE;
        header("felhasznalok.txt",$fiokok);
    } else {                    // sikertelen regisztráció
        $siker = FALSE;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Regisztráció</title>
    <link rel="stylesheet" href="css.css">
    <link rel="icon" type="image/x-icon" href="image/icon.png">

</head>
<body>

<div class="menu" id="sticky">
    <a href="index.php">Főoldal</a>
    <?php if(isset($_SESSION["felhasznalo"]) && !empty($_SESSION["felhasznalo"])){?>
        <a href="belépés.php">Belépés</a>
        <a href="regisztracio.php" style="background-color: lightgray; color: black">Regisztráció</a>
    <?php }else{ ?>
        <a href="profilom.php">Profilom</a>
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

<div id="page-container">
    <div id="content-wrap">
        <form class="regisztracio" action="regisztracio.php" method="POST">
            <fieldset>
                <legend style="text-align: center; ">Regisztrációs adatok</legend>
                <label for="nev">Teljes név:</label>
                <input type="text" id="nev" name="nev" value="<?php if (isset($_POST['nev'])) echo $_POST['nev']; ?>"
                       required/> <br/><br/>
                <label for="email">E-mail cím:</label>
                <input type="email" id="email" name="email"
                       value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" required/> <br/><br/>
                <label for="tel">Telefonszám:</label>
                <input type="tel" id="tel" name="tel" value="<?php if (isset($_POST['tel'])) echo $_POST['tel']; ?>" required/> <br/><br>
                <p>Nem:</p>
                <label for="egyeb">Egyéb:</label>
                <input type="radio" id="egyeb" name="nem" value="egyeb" <?php if (isset($_POST['nem']) && $_POST['nem'] === 'egyeb') echo 'checked'; ?>"/><br><br>
                <label for="ferfi">Férfi:</label>
                <input type="radio" id="ferfi" name="nem" value="ferfi" <?php if (isset($_POST['nem']) && $_POST['nem'] === 'ferfi') echo 'checked'; ?>"/><br><br>
                <label for="no">Nő:</label>
                <input type="radio" id="no" name="nem" value="no" <?php if (isset($_POST['nem']) && $_POST['nem'] === 'no') echo 'checked'; ?>"/><br><br>
                <label for="jelszo">Jelszó:</label>
                <input type="password" id="jelszo" name="jelszo" value="<?php if (isset($_POST['jelszo'])) echo $_POST['jelszo']; ?>" required/><br/><br/>
                <label for="jelszo2">Jelszó ismét:</label>
                <input type="password" id="jelszo2" name="jelszo2" value="<?php if (isset($_POST['jelszo2'])) echo $_POST['jelszo2']; ?>" required/><br/><br/>

            </fieldset>
            <br><br>
            <fieldset class="buttons">
                <legend style="text-align: center;">Számlázási cím</legend>
                <label for="varos">Város:</label>
                <input type="text" id="varos" name="varos"
                       value="<?php if (isset($_POST['varos'])) echo $_POST['varos']; ?>" required/><br><br>
                <label for="iranyitoszam">Irányítószám:</label>
                <input type="number" id="iranyitoszam" name="iranyitoszam"
                       value="<?php if (isset($_POST['iranyitoszam'])) echo $_POST['iranyitoszam']; ?>" required/>
                <br><br>
                <label for="kozterulet">Közterület és típusa:</label>
                <input type="text" id="kozterulet" name="kozterulet"
                       value="<?php if (isset($_POST['kozterulet'])) echo $_POST['kozterulet']; ?>" required/><br><br>
                <label for="hazszam">Házszám:</label>
                <input type="number" id="hazszam" name="hazszam"
                       value="<?php if (isset($_POST['hazszam'])) echo $_POST['hazszam']; ?>" required/>
            </fieldset>
            <br><br>
            <div class="buttons">
                <input type="submit" name="regisztracio" formmethod="post" id="kuldes" value="Küldés"/>
                <input type="reset" id="reset" value="Visszaállítás"/>
            </div>
        </form>
        <?php
        if (isset($siker) && $siker === TRUE) {  // ha nem volt hiba, akkor a regisztráció sikeres
            echo "<p>Sikeres regisztráció!</p>";
        } else {                                // az esetleges hibákat kiírjuk egy-egy bekezdésben
            foreach ($hibak as $hiba) {
                echo "<p>" . $hiba . "</p>";
            }
        }
        ?>
        <div>

            <footer id="footer">
                <?php include_once "./footer.php" ?>
            </footer>
        </div>
    </div>
</div>


</body>

</html>

