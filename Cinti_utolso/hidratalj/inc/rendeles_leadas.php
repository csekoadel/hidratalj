<?php
	
	/*
	echo "<pre>";
	print_r( $_SESSION);
	echo "</pre>";
	echo "<pre>";
	print_r( $_POST);
	echo "</pre>";
	*/
	if(ISSET($_POST['rendeles_leadas'])){
		 $osszesen  = 0;
		 
		 foreach ($_SESSION['kosar'] as $termek_id => $darabszam) { 
							 
							
							/*
							itt lekérjük a temrék táblából temrékid alapján a temrék adatait, hogy a résszösszeghez tudjuk mennyibe kerül, és a darabszámmal felszorozhassuk. 
							*/
							$termek_sql = "select * FROM termekek WHERE termekek_id = '$termek_id'"; 
							$sor = mysqli_query($conn , $termek_sql);
							$termek_adatok = mysqli_fetch_assoc($sor);
							$reszosszeg = $termek_adatok["ar"] * $darabszam;
							
							$termek_nev = $termek_adatok["nev"];
							$termek_ar = $termek_adatok["ar"];
							
							
							
							/* amikor majd a temrékeke beírjuk a rendeles_termekek táblába, előkészülünk annak a beíró SQL kódjával úgy, hoyg a megrendeles_id -t majd később cseréljük le.
							*/
							$sql_termekek[] = "INSERT INTO megrendeles_termekek SET megrendeles_id = '%megrendeles_id%', 
							termek_id='$termek_id',termekek_nev = '$termek_nev', ar = '$termek_ar', mennyiseg = '$darabszam'";
							
							$osszesen += $reszosszeg;
							
							/*
							itt készítünk egy cikluson belüli lekérést a temrékek táblából, termekid alapján.
							
							ami vissza adja a temrék árát. 
							
							és a $darabszam pedig a kosár tömbből jön. ezér ttudjuk kitenni az árat, részösszegét.
							
							és cikluson belül bevezettünk egy osszesen változót. 
							*/
							 
						}
		/*
		most mit csináljon a program ?
		lenne mégis egy gyors kérdésemD:
		termek_sql és insert_termekek változóknak mi a szerepük?
		*/
		
		$felhasznalo_id =  $_SESSION['felhasznalo_id'] ;

		// SQL lekérdezés
		$sql = "SELECT * FROM felhasznalok WHERE id = $felhasznalo_id";
		//echo $sql;
		
		$result = mysqli_query($conn, $sql);
		//Ha van találat lefut a következő sor
		if ($result) {
			$adatok = mysqli_fetch_assoc($result); 
			
		//	print_r( $adatok );
			
			$felhasznalo_id = $_SESSION['felhasznalo_id'];
			$megrendeles_nev = $adatok["nev"];
			$most = date('Y-m-d H:i:s');/* az aktuális időt így betudod menteni egy ávltozóba. */
			 /*
			 hol a hiba :)
			 üresen maradt a felhasználó id -je. erre mondta is a hiba a forráskódban, hogy mi a változó amit mi írtunk és az a változó nem létezik.
			 
			 figyelni kell a hibákat
			 Notice: Undefined variable: megrendelo in /home/vol10_2/byethost8.com/b8_33974532/htdocs/inc/rendeles_leadas.php on line 32
			 
			 32. sornál volt egy hiba hogy a $megrendelo ott van, de nem abba tároljuk a felhasználó id -jét.
			 
			 ezért hasznos a hibák mutatása. 
			 
			 
			 INSERT INTO `megrendeles` (felhasznalo_id, megrendeles_nev ) 
										VALUES('', 'Cinty' )
										
										
			 
			 */
			
			//itt még ugye nincs megrendeles_id
			
			$sql = "INSERT INTO `megrendeles` (felhasznalo_id, megrendeles_nev , rendeles_ideje , osszesen ) VALUES('$felhasznalo_id', '$megrendeles_nev' ,'$most' , '$osszesen' )";
			//echo $sql;
			$conn->query( $sql ) or die(mysqli_error($conn));
			
			$megrendeles_id = mysqli_insert_id( $conn ); /* amit most beírtunk a táblába új sort, annak az elsődleges kulcs értékét adja vissza.
			
			// csak itt készül el a megrendeles_id -je ami a rendelés azonosítója lesz.
			 
			
			*/
			//echo "Megrendeles id-je: $megrendeles_id<br />";
			//echo "<pre>";
			//print_r( $sql_termekek );
			//echo "</pre>";
			/*
			itt aza trükk, hogy már elő állt a beíró kód ami a temrékeket teszi a megrendeles_termekek táblába, amolyan idegen kulcsként jelen van a megrendeles_id ami hivatkozik a megrendelesek táblára.
			
			de azelőtt állítottuk össze ezt a beíró kódot, mielőtt még tudnánk a megrendeles_id -jét :)
			
			ezért kell bejárjuk a $sql_termekek tömböt, és cseréljük majd a 
			
			%megrendeles_id% szöveget, a megrendeles_id értékére.
			
			ez eddig stimt ? vagy mondjam el másképp .
			
			Eddig szerintem stimmel. Annyi hogy akkor annak a jelnek a megrendelés körül speciális szerepe van?
			
			igen. paramétert használtun ka megrendeles_id leendő beszúrására.
			a függvény neve str_replace
			*/
/*			str_replace(
				array|string $search,  mit keresünk..
				array|string $replace, .. mire cseréljük.
				string|array $subject,  .. melyik szövegben cseréljük le, amolyan változóneveket lehet beadni neki.  array vagy pedig szöveges formában.
				int &$count = null
			): string|array

*/
/*
INSERT INTO megrendeles_termekek SET megrendeles_id = '7', termek_id='1',termekek_nev = 'Szivárvány', ar = '3000', mennyiseg = '1'
INSERT INTO megrendeles_termekek SET megrendeles_id = '7', termek_id='6',termekek_nev = 'Fém kulacs', ar = '3000', mennyiseg = '10'
mint látod beszúrta a 7-es rendelést, bele írta a nevet, stb, és előállt a 7-es id vel a megrendelések táblában ..

ezt lecseréltük a temrékek beszúrásához.



*/


			/* itt meg bejárjuk a termékek insert kódjait, és cseréljük benne a megrendeles_id értékét, amit %% jelek közé paramétereztünk be .*/
			foreach($sql_termekek AS $sql2){
				
				$sql2 = str_replace("%megrendeles_id%", $megrendeles_id   ,  $sql2 );
				
				echo $sql2."<br />";
				mysqli_query( $conn ,  $sql2) or die( mysqli_error($conn));
			}
			//die(); remélem így érthető .
		
			
			unset( $_SESSION["kosar"]);
			
			
			header("location:index.php?oldal=rendeles_leadva_sikeresen");
			die();
			
		}		
				
		 
		
	}
?> 