<?php
include("inc/connect.php");

function nemet_konvertal($betujel) {		// egy segédfüggvény, amely visszaadja a betűjelnek megfelelő nemet
    switch ($betujel) {
        case "ferfi" : return "férfi";break;
        case "no" : return "nő"; break;
        case "egyeb" : return "egyéb"; break;
    }
}
?>
<div id="page-container">
    <div id="content-wrap">
		
<section id="content">
<h3 style="margin-top:50px;">Profilom</h3>
	<hr/>
				


<?php
// Felhasználó ID-ja
$felhasznalo_id =  $_SESSION['felhasznalo_id'] ;

// SQL lekérdezés
$sql = "SELECT * FROM felhasznalok WHERE id = $felhasznalo_id";
$result = mysqli_query($conn, $sql);
//Ha van találat lefut a következő sor
if ($result) {
    $row = mysqli_fetch_assoc($result); 
    // Profilkép
    echo "<img src='" . $row["profilkep"] . "' alt='Profilkép' width='70' height='70'>";

    // Felhasználói adatok
    echo "<ul>";
    echo "<li>Teljes név: " . $row["nev"] . "</li>";
    echo "<li>Email: " . $row["email"] . "</li>";
    echo "<li>Telefon: " . $row["tel"] . "</li>";
    echo "<li>Nem: " . nemet_konvertal($row["nem"]) . "</li>";
    echo "<li>Város: " . $row["varos"] . "</li>";
    echo "<li>Irányítószám: " . $row["iranyitoszam"] . "</li>";
    echo "<li>Közterület típusa: " . $row["kozterulet_tipusa"] . "</li>";
    echo "<li>Házszám: " . $row["hazszam"] . "</li>";
    echo "</ul>";
} else {
    echo "Hiba történt a lekérdezés során: " . mysqli_error($conn);
}
?>

<form action="index.php?oldal=profilkep" method="POST" enctype="multipart/form-data">
    <label for="profilkep">Profilkép:</label>
    <input type="file" name="profilkep" id="profilkep">
    <button type="submit" name="profilkep">Feltöltés</button>
</form>
<form action="index.php?oldal=torles" method="POST">
   <button type="submit" name="torles">Profil törlése</button>
</form>
<form action="index.php?oldal=modositas" method="POST">
   <button type="submit" name="modositas">Profil módosítása</button>
</form>


<?php 

// A felhasználó azonosítója
$felhasznalo_id = $_SESSION["felhasznalo_id"];

$sql = "SELECT megrendeles.megrendeles_id, megrendeles.rendeles_ideje, megrendeles.osszesen, megrendeles_termekek.termekek_nev, megrendeles_termekek.ar, 			megrendeles_termekek.mennyiseg 
        FROM megrendeles 
        JOIN megrendeles_termekek ON megrendeles.megrendeles_id = megrendeles_termekek.megrendeles_id 
        WHERE megrendeles.felhasznalo_id = $felhasznalo_id 
        ORDER BY megrendeles.rendeles_ideje DESC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	
    echo "<table><thead><tr><th>Megrendelés azonosítója</th><th>Rendelés dátuma</th><th>Termék neve</th><th>Ár</th><th>Mennyiség</th><th>Összesen</th></tr></thead><tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["megrendeles_id"] . "</td><td>" . $row["rendeles_ideje"] . "</td><td>" . $row["termekek_nev"] . "</td><td>" . $row["ar"] . "</td><td>" . $row["mennyiseg"] . "</td><td>" . $row["osszesen"] . "</td></tr>";
    }
    echo "</tbody></table>";
} else {
    echo "Nincs megrendelés.";
}

$conn->close();

?>
</div>
 </section>
 </div>

 