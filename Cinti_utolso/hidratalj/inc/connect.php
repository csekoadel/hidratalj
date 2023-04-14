<?php
session_start();
 
/*
$conn = new mysqli("sql305.byethost8.com", "b8_33974532", "Kedvencem11", "b8_33974532_teszt") or die(mysqli_connect_error());
*/

$servername = "sql305.byethost8.com";
$username = "b8_33974532";
$password = "Kedvencem11";
$dbname = "b8_33974532_teszt";

// Kapcsolat létrehozása
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Kapcsolat ellenőrzése
if (!$conn) {
    die("Kapcsolódási hiba: " . mysqli_connect_error());
}

// Állítsd be a karakterkódolást UTF-8-ra
if (!$conn->set_charset("utf8")) {
    //printf("Karakterkódolás beállítása sikertelen: %s\n", $conn->error);
} else {
    //printf("Az aktuális karakterkódolás: %s\n", $conn->character_set_name());
}


