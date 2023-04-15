<?php 

//session_start(); 

 
function profilkep(string $felhasznalo) : array {
    $hiba = array();
    if (isset($_FILES["profilkep"]) && is_uploaded_file($_FILES["profilkep"]["tmp_name"])) {
        if ($_FILES["profilkep"]["error"] !== 0) {
            $hiba[] = "Hiba történt a fájl feltöltése során!";
        }

        $format = strtolower(pathinfo($_FILES["profilkep"]["name"], PATHINFO_EXTENSION));

        if ($_FILES["profilkep"]["size"] > 5242880) {
            $hiba[] = "A fájl mérete túl nagy!";
        }

        if (count($hiba) === 0) {
            $route = "image/profilkepek/$felhasznalo.$format";
            $flag = move_uploaded_file($_FILES["profilkep"]["tmp_name"], $route);

            if (!$flag) {
                $hiba[] = "A profilkép elmentése nem sikerült!";
            }
        }
    }
    return $hiba;
}

function profilkep_mentes(string $felhasznalo) {
    $fajl = fopen("felhasznalok.txt", "r+");
    $sorok = file("felhasznalok.txt");

    foreach ($sorok as &$sor) {
        $adatok = explode(";", $sor);
        if ($adatok[0] == $felhasznalo) {
            $adatok[9] = "image/profilkepek/$felhasznalo." . pathinfo($_FILES["profilkep"]["name"], PATHINFO_EXTENSION);
            $sor = implode(";", $adatok);
            break;
        }
    }

    file_put_contents("felhasznalok.txt", implode("", $sorok));
    fclose($fajl);
}
 

if (isset($_POST["profilkep_feltolt"]) && is_uploaded_file($_FILES["profilkep"]["tmp_name"])) {
    
	
echo "<pre>";
print_r( $_FILES );
echo "</pre>";
// ez ilyenkor feltölti a szerverre a php fájlt ?
die();


	$felhasznalo = $_SESSION["felhasznalo"]["felhasznalonev"];
    $hiba = profilkep($felhasznalo);
    
	   
	if (count($hiba) === 0) {
			$profilkep_elérési_útvonal = ".../image/profilkepek/$felhasznalo." . pathinfo($_FILES["profilkep"]["name"], PATHINFO_EXTENSION);
			$_SESSION["felhasznalo"]["profilkep"] = $profilkep_elérési_útvonal;
			profilkep_mentes($felhasznalo);
	}
	
	die();
}
//
header("location:index.php?oldal=profilom");
?>