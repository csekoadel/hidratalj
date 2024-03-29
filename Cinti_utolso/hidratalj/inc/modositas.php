<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if(empty($_SESSION['felhasznalo_id'])){
	header("Location: index.php?oldal=belépés");
	die();
}
 

// az űrlapfeldolgozás során keletkező hibákat ebbe a tömbbe fogjuk gyűjteni
$hibak = [];
if(isset($_POST['mentes'])) { 
	 
	$felhasznalo_id =  $_SESSION['felhasznalo_id'] ;

	 // a kötelezően kitöltendő mezők ellenőrzése
    if (!isset($_POST["nev"]) || trim($_POST["nev"]) === "")
        $hibak[] = "A teljes név megadása kötelező!";



    if (!isset($_POST["tel"]) || trim($_POST["tel"]) === "")
        $hibak[] = "A telefon megadása kötelező!";

    if (!isset($_POST["nem"]) || trim($_POST["nem"]) === "")
        $hibak[] = "A nem megadása kötelező!";

    

    if (!isset($_POST["varos"]) || trim($_POST["varos"]) === "")
        $hibak[] = "A város megadása kötelező!";

    if (!isset($_POST["iranyitoszam"]) || trim($_POST["iranyitoszam"]) === "")
        $hibak[] = "Az irányítószám megadása kötelező!";

    if (!isset($_POST["kozterulet_tipusa"]) || trim($_POST["kozterulet_tipusa"]) === "")
        $hibak[] = "A közterület típusának megadása kötelező!";

    if (!isset($_POST["hazszam"]) || trim($_POST["hazszam"]) === "")
        $hibak[] = "A házszám megadása kötelező!";


		// űrlapadatok lementése változókba
		
		$nev = $_POST["nev"];
 
		$tel = $_POST["tel"];
		 
		$varos = $_POST["varos"];
		$iranyitoszam = $_POST["iranyitoszam"];
		$kozterulet_tipusa = $_POST["kozterulet_tipusa"];
		$hazszam = $_POST["hazszam"];


		if (isset($_POST["nem"]))           // csak akkor kérjük le a nemet, ha megadták
			$nem = $_POST["nem"];

	
		if (count($hibak) === 0) {
			 
			  $sql = "UPDATE felhasznalok SET nev='$nev',   tel='$tel', nem='$nem', varos='$varos', iranyitoszam='$iranyitoszam', kozterulet_tipusa='$kozterulet_tipusa', hazszam='$hazszam' WHERE id=$felhasznalo_id";
		
			
			$result = mysqli_query($conn, $sql);

			if ($result) {
				$uzenet= "A felhasználói adatok frissítése sikeres volt.";
			} else {
				$uzenet =  "Hiba történt a frissítés során: " . mysqli_error($conn);
			}
		}

			
	 
}
 	
$felhasznalo_id =  $_SESSION['felhasznalo_id'] ;

// SQL lekérdezés
$sql = "SELECT * FROM felhasznalok WHERE id = $felhasznalo_id";
$result = mysqli_query($conn, $sql) or die( mysqli_error( $conn ));
//Ha van találat lefut a következő sor
if ($result) {
	$row = mysqli_fetch_assoc($result); 
	//mi van a tömbben, mindig érdemes megnézni.
	 
}else{

	die();
}	
?>

<!DOCTYPE html>
<html lang="en">

<div id="page-container">
    <div id="content-wrap">
				
		<!-- Űrlap a felhasználói adatok módosításához -->
		<form method="post" action="index.php?oldal=modositas">
				Teljes név: <input type="text" name="nev" value="<?php echo $row["nev"]; ?>"><br>
				Email: <input type="email" name="email" value="<?php echo $row["email"]; ?>" readonly><br>
				Telefon: <input type="tel" name="tel" value="<?php echo $row["tel"]; ?>"><br>
				Nem: <input type="radio" name="nem" value="ferfi" <?php if ($row["nem"] == "ferfi") { echo "checked"; } ?>> Férfi
					 <input type="radio" name="nem" value="no" <?php if ($row["nem"] == "no") { echo "checked"; } ?>> Nő<br>
				Város: <input type="text" name="varos" value="<?php echo $row["varos"]; ?>"><br>
				Irányítószám: <input type="text" name="iranyitoszam" value="<?php echo $row["iranyitoszam"]; ?>"><br>
				Közterület típusa: <input type="text" name="kozterulet_tipusa" value="<?php echo $row["kozterulet_tipusa"]; ?>"><br>
				Házszám: <input type="text" name="hazszam" value="<?php echo $row["hazszam"]; ?>"><br>
				<input type="submit" name="mentes" value="Mentés">

		</form>
		
		<?php 
		if(isset($uzenet)){
			echo $uzenet;
		}
		if(isset($hibak) AND count($hibak) > 0 ){
			echo "Kérjük javítsd a hibákat az űrlapban:<br />";
			echo implode('<br />' , $hibak );
		}
		?>
	</div>
</div>
</html>