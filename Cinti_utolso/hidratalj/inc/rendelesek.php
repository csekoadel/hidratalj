<?php 
include("inc/connect.php");

/*
 $_SESSION['felhasznalo_id'] = $row['id'];
                $_SESSION['admin'] = $row['admin']; // a felhasználók táblába került egy admin értéke. ahol ez 1 akkor ott adminról van szó,
*/
if(!isset($_SESSION["felhasznalo_id"])){
	header("Location: index.php");
	die();
}else{
	if($_SESSION["admin"]==1){
		/* minden ok!*/
	}else{
		header("Location: index.php");
		die();
	}
}
/*
a gomboknál azt a részt érted hogy ment ? idnex.hpp ben .
igen, az ott világos, a felhazsnalo_id-ra átírást én is elkezdtem, csak az admin ellenőrzése nem volt jó, és nem tudtam mi miatt nem fut le, így hagytam egyelőre eredetiben

melyik rész hiányos, vagy mihez volna kérdésed 

A kosárt próbáltam elkezdeni, ott abban nem vagyok biztos, mit milyen tömbből kell lekérjek
*/
?>
<!DOCTYPE html>
<html lang="hu">

<div id="page-container">
    <div id="content-wrap">
        <h1 style="position: relative; z-index: 9;text-align:center;display:inline-block">Összes rendelés:</h1>
        <div style="overflow-x:auto;">


	<?php 

		// adatok lekérdezése és táblázatba rendezése
		$sql = "SELECT * FROM megrendeles";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		  echo "<table><tr><th>Megrendelés azonosító</th><th>Felhasználó azonosító</th><th>Megrendelés neve</th><th>Rendelés ideje</th><th>Összesen</th><th></th></tr>";
		  while($row = $result->fetch_assoc()) {
			echo "<tr><td>" . $row["megrendeles_id"]. "</td><td>" . $row["felhasznalo_id"]. "</td><td>" . $row["megrendeles_nev"]. "</td><td>" . $row["rendeles_ideje"]. "</td><td>" . $row["osszesen"]. "</td><td>
			
			
			<a href='index.php?oldal=megrendeles_reszletek&megrendeles_id=". $row["megrendeles_id"] . "'>Részletek</a>
			
			
			</td></tr>";
		  }
		  echo "</table>";
		} else {
		  echo "Nincs találat.";
		}


	?>




		</div>

    </div>
</div>

</html>

