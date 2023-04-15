<?php
include("inc/connect.php");


if (isset($_POST["email"], $_POST["jelszo"])) {
    $email = trim($_POST["email"]);
    $jelszo = $_POST["jelszo"];

    // ellenőrizzük az email és jelszó formátumát
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $hibak[] = "Az email formátuma nem megfelelő!";
    }

	 
    if (empty($jelszo)) {
        $hibak[] = "A jelszó megadása kötelező!";
    }else{
		$jelszo = sha1($jelszo );
	}
	
	//a jelszó 123456 :)
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
                $_SESSION['admin'] = $row['admin']; // a felhasználók táblába került egy admin értéke. ahol ez 1 akkor ott adminról van szó,
                
				if($_SESSION['admin']!==1){
					header("Location: index.php?oldal=rendelesek");
					exit();
				} else {
					header("Location: index.php?oldal=profilom");
					exit();
				}
				
            } else {
                 
				$hibak[] = "Hibás email vagy jelszó!";
            }
        } else {
            $hibak[] = "Hibás email vagy jelszó!";
        }
    }
}

if (isset($hibak)) {
    $uzenet = implode("<br />", $hibak);
}else{
	$uzenet="";
}


/*
 volt az amit mondtam, a &i=1 rész, most nem találom, de emlékszem a belépésnél használtad is, azt nem értettem mi a funkciója

szerintem az a rész zavaró volt, nem láttam én sem funkcióját szóval szerintem azt lehet felejteni.

Akkor rendben van:D
akkor neki lehet állni a rendelés részleteinek.

,eagPrózbálod megoldani, és jelentkezel ha valami nem klappol ?Neked is!

Rendben. Tehát ott a felhazsnáló adatait illetve a termékek pontos adatait kellene lekérnem, ha jól értem?

igen. ugyanazokat az értékekek kell kiírni mint amiket a táblába mentettél.összegzés, és lehet tovább menni, pl státuszokkal kellene ellátni a rendeléseket.

Az összegzés meglesz, viszont a státusz szép lenne, de sajnos a gyakorlatvezetőket nem érdekli, úgyhogy azután talán az adatok módosítását nézem még át

rendben. valami van szólj.

jó programozást :)

Ezer hála!:)

nincs mit, szép napot :)


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