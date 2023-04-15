<?php
 
print_r( $_POST );
die();

if (isset($_POST['termek_id']))
{
    $termek_id = $_POST['termek_id'];

    // SQL lekérdezés végrehajtása az összes termék lekérésére
    $query = "SELECT * FROM `termekek` WHERE `termekek_id` = '$termek_id'";
	echo $query;  
	
	
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
 
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

    print_r( $_SESSION );
    //header("location:index.php?oldal=megrendeles");

}
?>