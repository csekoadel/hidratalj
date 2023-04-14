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

<style>
    ul, li {
        color: black;
    }
	footer>li{
		color:white;
	}
</style>
 
<section id="content">
    <h2>Profilom</h2>
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
    echo "<img src='" . $row["profilkep"] . "' alt='Profilkép' width='40' height='40'>";

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


</section>


 
 