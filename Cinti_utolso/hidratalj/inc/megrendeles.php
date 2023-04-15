<?php 

if(isset($_POST['modositas'])) {
	
    $termek_id = $_POST['termek_id'];
    $darabszam = $_POST['darabszam'];
	
	if ($darabszam <= 0) {
		unset($_SESSION['kosar'][$termek_id]);
	} 
	else{
		
		if($darabszam>10){ 
			
		}else{
			
			
			$_SESSION['kosar'][$termek_id] = $darabszam;
			
		}
		 
	} 
    header("Location: index.php?oldal=megrendeles");
	
	die();
}

?>


<div id="page-container">
    <div id="content-wrap">
        <h1 style="position: relative; z-index: 9;text-align:center;display:inline-block">Kosár tartalma:</h1>
        <div style="overflow-x:auto;">
		<div style="text-align:center;">
					<?php 
					 
			if(!isset($_SESSION["kosar"])){
						
				echo "Nincs semmi a kosárba!";
			}else{
					?>
					</div>
					<?php 
		//			echo "<pre>";
					//print_r( $_SESSION['kosar'] );
					//echo "</pre>";
	/*				
					<pre>Array
(
    [1] =&gt; 1
    [6] =&gt; 10
)
</pre>

ezt a részt úgy csináltuk meg hogyha beteszel egy temréket a kosárba, termék ID -vel azonosítja be, az indexelése a tömbnek temrék id -vel történik.

és a darabszám, hogy hányat szeretne azt mentettük mellé.

módosításnál, illetve kosárba rakásnál ezt a darabszámot manipuláljuk.

ebből foreach -csel tudjuk kinyerni mely temrékeket tetted a kosárba.

foreach -en belüle amikor bejárod a tömböt,
 $termek_id => $darabszam
 
 érték párokban kapod vissza a temrék id és darabszámát.
 $osszesen+=$reszosszeg;
 
 amivel összeszámoljuk a részösszeneket és végül kiíratjuk itt..
 
*/
					?>
					<table>
					  <thead>
						<tr>
						  <th id="termeknev" colspan="2">Kiválasztott termék</th>
						  <th id="db">Darabszám</th>
						  <th id="ar">Ár</th>
						  <th id="ar">Részösszeg</th>
						</tr>
					  </thead>
					  <tbody>
						<?php
						$osszesen = 0; 
					  
					 foreach ($_SESSION['kosar'] as $termek_id => $darabszam) { 
							 
											 
							/*
							itt készítünk egy cikluson belüli lekérést a temrékek táblából, termekid alapján.
							
							ami vissza adja a temrék árát. 
							
							és a $darabszam pedig a kosár tömbből jön. ezér ttudjuk kitenni az árat, részösszegét.
							
							és cikluson belül bevezettünk egy osszesen változót. 
							*/
							$termek_sql = "select * FROM termekek WHERE termekek_id = '$termek_id'"; 
							$sor = mysqli_query($conn , $termek_sql);
							$termek_adatok = mysqli_fetch_assoc($sor);
							$reszosszeg = $termek_adatok["ar"] * $darabszam;
							?>
							<tr>
								<td headers="termeknev">
									<img src="image/<?php echo $termek_adatok["kep"]?>" width="70">
								</td>
								<td headers="termeknev"><?php echo $termek_adatok['nev']; ?></td>
								<td headers="db">
									 
									
									<form method="post" action="">
										<input type="hidden" name="termek_id" value="<?php echo $termek_id; ?>">
										<input type="number" name="darabszam" min="0" max="10" value="<?php echo $darabszam; ?>"> db 
										<input type="submit" name="modositas" value="Módosít">
									</form>
									 
									
								</td>
								<td headers="ar"><?php echo $termek_adatok["ar"]; ?> Ft</td>
								<td headers="ar"><?php echo $reszosszeg ; ?> Ft</td>
							</tr>
							<?php
							$osszesen+=$reszosszeg;
						}

						?>
						 <tr>
							<td headers="termeknev">Összesen</td>
							<td headers="termeknev"> </td>
							<td headers="db"> </td>
							<td headers="ar"> </td>
							<td headers="ar"><?php echo  $osszesen ; ?> Ft</td>
						  </tr>
						
						
						<tr>
							<form method="post" action="index.php?oldal=rendeles_leadas">
								<td style="text-align: center; border: none; " colspan="4"><button name="rendeles_leadas" type="submit" id="bejelentkezes">Megrendelés</button></td>
							</form>
						</tr>
					  </tbody>
					</table>

			<?php 
				}
			?>
        </div>

    </div>
</div>

</html>

