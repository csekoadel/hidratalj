<?php 


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
 
?>
 
<div id="page-container">
    <div id="content-wrap">
    <h1 style="position: relative; z-index: 9;text-align:center;display:inline-block">Megrendelés részletei:</h1>
        <div style="overflow-x:auto;">

			<div class="table-container">
					<?php 

						$megrendeles_id = $_GET['megrendeles_id'];

						// Lekérdezzük a megrendelés adatait
						$sql = "SELECT megrendeles.megrendeles_nev, megrendeles.rendeles_ideje, megrendeles.osszesen, felhasznalok.nev, felhasznalok.email, felhasznalok.varos, felhasznalok.iranyitoszam, felhasznalok.kozterulet_tipusa, felhasznalok.hazszam
						FROM megrendeles
						JOIN felhasznalok ON megrendeles.felhasznalo_id=felhasznalok.id
						WHERE megrendeles.megrendeles_id = $megrendeles_id";

						$result = $conn->query($sql);

						if ($result->num_rows > 0) {

								// Megjelenítjük a megrendelés adatait
								 $row = $result->fetch_assoc() ;
										
									
									
									
									echo "<table>";
									echo "<tr><td><strong>Megrendelő neve: </strong></td><td>" . $row["nev"] . "</td></tr>";
									echo "<tr><td><strong>Megrendelő e-mail címe: </strong></td><td>" . $row["email"] . "</td></tr>";
									echo "<tr><td><strong>Szállítási cím: </strong></td><td>" . $row["varos"] . " " . $row["iranyitoszam"] . " " . $row["kozterulet_tipusa"] . " " . $row["hazszam"] . "</td></tr></table>";
									
									
									
									
									
									
									echo "<table><thead><tr><th>Termék neve</th><th>Ár</th><th>Mennyiség</th><th>Összesen</th></tr></thead>";
							 
								// Lekérdezzük a megrendelt termékek adatait
								$sql2 = "SELECT termekek_nev, ar, mennyiseg, ar*mennyiseg AS osszesen FROM megrendeles_termekek WHERE megrendeles_id = $megrendeles_id";
								$result2 = $conn->query($sql2);

								if ($result2->num_rows > 0) {
									while($row2 = $result2->fetch_assoc()) {
										echo "<tr><td>" . $row2["termekek_nev"] . "</td><td>" . $row2["ar"] . "</td><td>" . $row2["mennyiseg"] . "</td><td>" . $row2["osszesen"] . "</td></tr>";
									}
								}
								echo '</table><br />';
								 
		


						}
				?>
			</div>
			<?php
			echo "<div class='osszesen_div'>
			<th>Összesen: ". number_format($row["osszesen"] , 0 , '.' , " " ) ."Ft</th>
			</div>
			";
			?>
			
		</div>
		 
    </div>
</div>
 
 <style>
.osszesen_div {
	padding-top:20px;

  text-align: center;
  font-size: 24px;
}
.table-container {
  display: flex;
  flex-wrap: wrap;
}

.table-container table {
  flex: 1;
  margin-right: 20px;
  margin-left: 20px;
}

 </style>