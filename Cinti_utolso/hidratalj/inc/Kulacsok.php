<!DOCTYPE html>
<html lang="hu">


<div class="main">

	<?php 
		$sql = "SELECT * FROM termekek WHERE kategoria = 'Kulacs'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
					?>
					<div class="cards">
						<div class="image">
							<img src="image/<?php echo $row['kep']; ?>" alt="<?php echo $row['nev']; ?>">
						</div>
						<div class="title">
							<h3><?php echo $row['nev']; ?></h3>
						</div>
						<div class="description">
							<p><?php echo $row['leiras']; ?></p>
							<br>
							<p><strong><?php echo number_format($row['ar'] , 2 , "." , " "); ?> Ft</strong></p>
							<form method="post" action="index.php?oldal=kosar">
								<input type="hidden" name="termek_id" value="<?php echo $row['termekek_id']; ?>">
								<button type="submit">Kosárba</button>
							</form>
						</div>
					</div>
					<?php
			}
		} else {
			echo "Nincs találat";
		}

	?>
	 
</div>


</html>