<?php


include("inc/connect.php");

if(isset($_SESSION['felhasznalo_id'])){
	

$user_id = $_SESSION['felhasznalo_id'] ;

// Feltöltött kép kitörlése
$sql = "SELECT profilkep FROM felhasznalok WHERE id='$user_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $file_path = $row['profilkep'];
    if (unlink($file_path)) {
        echo "A feltöltött kép törölve lett.";
    } else {
			//echo "Hiba történt a kép törlésekor.";
    }
} else {
    echo "Nincs ilyen felhasználói azonosító az adatbázisban.";
}


// Adatbázisból való törlés
$sql = "DELETE FROM felhasznalok WHERE id='$user_id'";
if ($conn->query($sql) === TRUE) {
    echo "Felhasználó törölve az adatbázisból. Várunk vissza :)";
} else {
    echo "Hiba történt: " . $conn->error;
}
 
unset( $_SESSION["felhasznalo_id"]);
}else{
	
	die("Nem vagy belépve!");
}
?>