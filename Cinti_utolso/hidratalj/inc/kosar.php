<?php


 
if (isset($_POST['termek_id']))
{
    $termek_id = $_POST['termek_id'];

    // SQL lekérdezés végrehajtása az összes termék lekérésére
    $query = "SELECT * FROM `termekek` WHERE `termekek_id` = '$termek_id'";
	 
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	if(mysqli_num_rows($result) == 0 ){
		
		header("Location: index.php");
		die();
		
	}
    // Az adatok hozzáadása a kosár SESSION tömbhöz.
    if (!isset($_SESSION['kosar']))
    {
        $_SESSION['kosar'] = array();
    }
	
    if (isset($_SESSION['kosar'][$termek_id]))
    {
        $_SESSION['kosar'][$termek_id] ++;
    }
    else
    {
        
        $_SESSION['kosar'][$termek_id] = 1; 
    }

    
	header("location:index.php?oldal=megrendeles");
	die();
	
}
?>