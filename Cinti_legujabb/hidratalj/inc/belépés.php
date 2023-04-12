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

	$uzenet = "<br>Sikertelen belépés! A belépési adatok nem megfelelők!";

        foreach ($fiokok as $fiok) {
            if ($fiok["email"] === $email && password_verify($jelszo, $fiok["jelszo"])) {
                $_SESSION["felhasznalo"] = $fiok;
                $uzenet = "Sikeres belépés!";
                header("location:index.php?oldal=fooldal");
                exit();
            } else {
                // Sikertelen belépés esetén törölni kell a felhasználói adatokat a munkamenetből
                unset($_SESSION["felhasznalo"]);
				$_SESSION["hiba"] = "Hibás e-mail cím vagy jelszó";
			
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="hu">


<div id="page-container">
    <div id="content-wrap">
        <div>
            <form class="bejelentkezes" action="index.php?oldal=belépés" method="POST">
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



</html>