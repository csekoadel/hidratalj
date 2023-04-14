<?php
include("inc/connect.php");

include "mindegyik.php";
if (isset($_POST["email"], $_POST["jelszo"])) {
    $email = trim($_POST["email"]);
    $jelszo = $_POST["jelszo"];

    // ellenőrizzük az email és jelszó formátumát
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $hibak[] = "Az email formátuma nem megfelelő!";
    }
	
	/*
	táblában:
	$2y$10$44jth/8q38.tdMMu.Brb2estJ/rB03SRotP2mE4kDL.c9UUzY4rNi
	
	küldve:
	$2y$10$44jth/8q38.tdMMu.Brb2estJ/rB03SRotP2mE4kDL.c9UUzY4rNi
	*/
	 
    if (empty($jelszo)) {
        $hibak[] = "A jelszó megadása kötelező!";
    }else{
		$jelszo = sha1($jelszo );
	}

    if (!isset($hibak)) {
        // ellenőrizzük, hogy az email foglalt-e a felhasználók adatbázisában
        $sql = "SELECT * FROM felhasznalok WHERE email = '$email'";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // ellenőrizzük a jelszót
            if ($jelszo == $row['jelszo'] ) {
                // ha a jelszó helyes, elmentjük a felhasználó azonosítóját a sessionbe
                $_SESSION['felhasznalo_id'] = $row['id'];
                //print_r( $_SESSION);
				
				header("Location: index.php?oldal=profilom&i=1");
                exit();
            } else {
                 
				$hibak[] = "Hibás email vagy jelszó!";
            }
        } else {
            $hibak[] = "Hibás email vagy jelszó!";
        }
    }
}
&i=1 az mi itt ?

if (isset($hibak)) {
    $uzenet = implode("<br />", $hibak);
}else{
	$uzenet="";
}


/*
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
*/
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