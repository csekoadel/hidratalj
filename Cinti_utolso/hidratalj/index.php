<?php
 ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include("inc/connect.php"); // itt is már volt session start a connect.php -n belül.
 

if (isset($_GET['oldal'])) 
    $oldal = $_GET['oldal']; 
  else 
    $oldal = "fooldal";   
if(isset($_SESSION["hiba"])) {
    $oldal = "belépés";
    unset($_SESSION["hiba"]);
}

?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Főoldal</title>
    <link rel="stylesheet" href="css.css">
    <link rel="icon" type="image/x-icon" href="image/icon.png">
    <meta name="viewport" content="width=device.width">
	<meta http-equiv="Cache-Control" content="max-age=3600">
	<meta http-equiv="Expires" content="Wed, 14 Apr 2023 15:30:00 GMT">
	
	
</head>
<body>


<div class="menu" id="sticky">
    <a href="index.php" <?php if($oldal == 'fooldal') { echo 'style="background-color: lightgray; color:white"'; } ?>>Főoldal</a>
		<?php 
		if(isset($_SESSION['felhasznalo_id']) && !empty($_SESSION['felhasznalo_id']) && $_SESSION["admin"] == 1){?>
			<a href="index.php?oldal=rendelesek" <?php if($oldal == 'rendelesek') { echo 'style="background-color: lightgray"'; } ?>>Megrendelések</a>
			<a href="index.php?oldal=kilepes">Kijelentkezés</a>
		<?php }else if(isset($_SESSION["felhasznalo_id"]) && !empty($_SESSION["felhasznalo_id"])){?>
			<a href="index.php?oldal=profilom" <?php if($oldal == 'profilom') { echo 'style="background-color: lightgray"'; } ?>>Profilom</a>
			<a href="index.php?oldal=kilepes">Kijelentkezés</a>
			<?php }else{ ?>
				<a href="index.php?oldal=belépés" <?php if($oldal == 'belépés') { echo 'style="background-color: lightgray"'; } ?>>Belépés</a>
				<a href="index.php?oldal=regisztracio" <?php if($oldal == 'regisztracio') { echo 'style="background-color: lightgray"'; } ?>>Regisztráció</a>
			<?php } ?>
			<div class="dropdown">
				<button class="dropbtn" <?php if($oldal == 'Kulacsok' || $oldal == 'Termoszok') { echo 'style="background-color: lightgray"'; } ?>>Termékek
				</button>
				<div class="dropdown-content">
					<a href="index.php?oldal=Kulacsok" <?php if($oldal == 'Kulacsok') { echo 'style="background-color: lightgray"'; } ?>>Kulacsok</a>
					<a href="index.php?oldal=Termoszok" <?php if($oldal == 'Termoszok') { echo 'style="background-color: lightgray"'; } ?>>Termoszok</a>
				</div>
			</div>
			
			<?php if(isset($_SESSION["felhasznalo_id"])  ){?>
			<a href="index.php?oldal=megrendeles" <?php if($oldal == 'megrendeles') { echo 'style="background-color: lightgray"'; } ?>><img src="image/kosar.png" alt="kosar" style="width:30px;height:30px;"></a>
		<?php } elseif (!isset($_SESSION["felhasznalo_id"]) ) { ?>
		<a href="index.php?oldal=belépés" <?php if($oldal == 'belépés' || $oldal == 'megrendeles') { echo 'style="background-color: lightgray"'; } ?>><img src="image/kosar.png" alt="kosar" style="width:30px;height:30px;"></a>
		<?php } ?> 

</div>

	<?php 
	 
		include_once("inc/" . $oldal . ".php"); 
	?>
	 
	
	
<footer id="footer"><?php include "./footer.php" ?></footer>
</body>
</html>