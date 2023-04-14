<?php
	
	if(ISSET($_POST['rendeles_leadas'])){
		
		$megrendelo = $_SESSION['felhasznalo']["email"];
		$megrendeles_nev = $_SESSION['kosar'][$nev];
		$megrendeles_db = $_POST['darabszam'];
		$megrendeles_ar = $_POST['reszosszeg'];
		$megrendeles_kep = addslashes(file_get_contents($_FILES['kep']['tmp_name']));
		$kep_neve = addslashes($_FILES['kep']['name']);
		$kep_merete = getimagesize($_FILES['kep']['tmp_name']);
		move_uploaded_file($_FILES['kep']['tmp_name'],"/image/" . $_FILES['kep']['name']);
		$sql = "INSERT INTO `megrendeles` (megrendelo, megrendeles_nev, megrendeles_ar, megrendeles_kep) VALUES('$megrendelo', '$megrendeles_nev', '$megrendeles_ar', '$megrendeles_kep')";
		
		$conn->query( $sql ) or die(mysqli_error());
		
		header("location:index.php?tartalom=profilom");
		die();
	}
?> 