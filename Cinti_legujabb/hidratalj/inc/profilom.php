<?php
session_start();

function nemet_konvertal($betujel) {		// egy segédfüggvény, amely visszaadja a betűjelnek megfelelő nemet
    switch ($betujel) {
        case "ferfi" : return "férfi";break;
        case "no" : return "nő"; break;
        case "egyeb" : return "egyéb"; break;
    }
}
?>
<!DOCTYPE html>
<html lang="hu">


<section id="content">
    <h2>Profilom</h2>
    <hr/>

<img src="<?php echo $_SESSION["felhasznalo"]["profilkep"]; ?>" alt="Profilkép">
<?php
// profiladatok kilistázása
echo "<li>Teljes név: " . $_SESSION["felhasznalo"]["nev"] . "</li>";
echo "<li>Email: " . $_SESSION["felhasznalo"]["email"] . "</li>";
echo "<li>Telefon: " . $_SESSION["felhasznalo"]["tel"] . "</li>";
echo "<li>Nem: " . nemet_konvertal($_SESSION["felhasznalo"]["nem"]) . "</li>";
echo "<li>Város: " . $_SESSION["felhasznalo"]["varos"] . "</li>";
echo "<li>Irányítószám: " . $_SESSION["felhasznalo"]["iranyitoszam"] . "</li>";
echo "<li>Közterület típusa: " . $_SESSION["felhasznalo"]["kozterulet"] . "</li>";
echo "<li>Irányítószám: " . $_SESSION["felhasznalo"]["hazszam"] . "</li>";
echo "</ul>";
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

</html>
