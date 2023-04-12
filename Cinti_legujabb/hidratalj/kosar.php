<?php
session_start();
$termek_id = $_POST['termek_id'];

// Az adatbázis kapcsolódás és az adatok lekérése SQL segítségével.
$servername = "ftpupload.net";
$username = "b8_33974532";
$password = "Kedvencem11";
$dbname = "b8_33974532_teszt";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// SQL lekérdezés végrehajtása az összes termék lekérésére
$query = "SELECT * FROM `termekek` WHERE `termek_id` = '$termek_id'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

// Az adatok hozzáadása a kosár SESSION tömbhöz.
if (!isset($_SESSION['kosar'])) {
    $_SESSION['kosar'] = array();
}

if (isset($_SESSION['kosar'][$termek_id])) {
    $_SESSION['kosar'][$termek_id]['mennyiseg']++;
} else {
    $termek = mysqli_fetch_assoc($result);
    $_SESSION['kosar'][$termek_id] = array(
        'nev' => $termek['nev'],
        'ar' => $termek['ar'],
       
    );
}

print_r($_SESSION['kosar']);
header("location:index.php?oldal=megrendelesek");

?>