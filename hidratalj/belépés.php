<?php
session_start();
include "mindegyik.php";
$fiokok = betoltott_felhasznalok("felhasznalok.txt");

$uzenet = "";

if (isset($_POST["login"])) {
    if (!isset($_POST["email"]) || trim($_POST["email"]) === "" || !isset($_POST["jelszo"]) || trim($_POST["jelszo"]) === "") {
        $uzenet = "<strong>Hiba:</strong> Adj meg minden adatot!";
    } else {
        $email = $_POST["email"];
        $jelszo = $_POST["jelszo"];

        $uzenet = "Sikertelen belépés! A belépési adatok nem megfelelők!";

        foreach ($fiokok as $fiok) {
            if ($fiok["email"] === $email && password_verify($jelszo, $fiok["jelszo"])) {
                $uzenet = "Sikeres belépés!";
                header("Location:index.php");
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Belépés</title>
    <link rel="stylesheet" href="css.css">
    <link rel="icon" type="image/x-icon" href="image/icon.png">
</head>
<body>

<div class="menu" id="sticky">
    <a href="index.php">Főoldal</a>
        <?php if(isset($_SESSION["felhasznalo"]) && !empty($_SESSION["felhasznalo"])){?>
        <a href="belépés.php"  style="background-color: lightgray; color: black">Belépés</a>
        <a href="regisztracio.php">Regisztráció</a>
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
        <div>
            <form class="bejelentkezes" action="belépés.php" method="POST">
                <fieldset>
                    <legend>Bejelentkezés</legend>
                    <label for="email">E-mail cím:</label>
                    <input  class="em" type="email" id="email" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" required/><br/><br/>
                    <label for="jelszo">Jelszó:</label>
                    <input  class="pass" type="password" id="jelszo" name="jelszo"
                           value="<?php if (isset($_POST['jelszo'])) echo $_POST['jelszo']; ?>" required/><br/><br/>
                </fieldset>
                <br><br>
                <input type="submit" name="login" formmethod="post" id="bejelentkezes" value="Bejelentkezés"/>
            </form>
            <?php echo $uzenet . "<br/>"; ?>
        </div>
    </div>
</div>
<footer id="footer"><?php include "./footer.php" ?></footer>
</body>


</html>