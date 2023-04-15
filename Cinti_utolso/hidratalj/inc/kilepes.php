<?php
    session_start();
	/*
	$_SESSION['felhasznalo_id'] = $row['id'];
                $_SESSION['admin'] = $row['admin']; // a felhasználók táblába került egy admin értéke. ahol ez 1 akkor ott adminról van szó,
				
	*/
   if(isset($_SESSION['felhasznalo_id'])){
	   unset( $_SESSION['felhasznalo_id'] );
   }
   if(isset($_SESSION['admin'])){
	   unset( $_SESSION['admin'] );
   }
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),session_id(),time()-3600,'/');
    }

    session_destroy();

    header("Location: index.php");
	
	
?>
