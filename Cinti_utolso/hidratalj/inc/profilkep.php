<?php  
 
 
if (isset($_POST["profilkep"]) && is_uploaded_file($_FILES["profilkep"]["tmp_name"])) {
	
    $felhasznalo_id = $_SESSION['felhasznalo_id']; 
	 
    $file_nev = $_FILES['profilkep']['name'];
    $file_meret = $_FILES['profilkep']['size'];
    $file_tmp = $_FILES['profilkep']['tmp_name'];
    $file_tipus = $_FILES['profilkep']['type'];
    $file_kit = strtolower(end(explode('.', $_FILES['profilkep']['name'])));
    
    $kiterjesztesek = array("jpeg","jpg","png");
    
    if(in_array($file_kit, $kiterjesztesek) === false){
        echo "Hiba: csak JPG, JPEG vagy PNG fájlokat tölthet fel.";
    }
    /*
	és amig nem annyira vagy gyakorlott, lehetőleg letöltve a fájlt, módosítás után töltsd vissza a szerverre. és néha mentést is csinálj a fájlokról nehogy esetleg valamit elronts, így tudsz visszalépni egy korábbi verzióra.
	Rendben, jó tipp, épp gondolkoztam is rajta, hogy ahogy eddig dolgoztam, a korábbiaknak már annyi:D
	
	akkor elkösönök, sziaszia :)
	Köszi 
	:(
	*/
    if($file_meret > 2097152) {
        echo 'Hiba: a fájl mérete nem lehet nagyobb, mint 2 MB';
    }
    
    $uj_file_nev = "image/profilkepek/" . uniqid() . '.' . $file_kit;
    
    if(move_uploaded_file($file_tmp,  $uj_file_nev)) {
        // A fájl sikeresen feltöltődött
         
        
        // UPDATE SQL kód a profilkep mezőbe való mentéshez
        $sql = "UPDATE felhasznalok SET profilkep = '$uj_file_nev' WHERE id = '$felhasznalo_id'";
//		echo $sql."<br />";
        // Futtatja az UPDATE SQL lekérdezést
        $result = mysqli_query($conn, $sql);
        
        if(!$result) {
            echo "Hiba történt az adatok mentésekor: " . mysqli_error($conn);
        } else {
            echo "A profil kép sikeresen frissült!";
        }
    } else {
        echo "Hiba történt a fájl feltöltésekor.";
    }
 

}
 
//die();

header("location:index.php?oldal=profilom");
die();

?>