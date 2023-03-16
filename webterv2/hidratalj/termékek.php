<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Termékek</title>
    <link rel="stylesheet" href="css.css">
    <link rel="icon" type="image/x-icon" href="image/icon.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
                <div class="menu" id="sticky">
                    <a href="index.php">Főoldal</a>
                    <a href="regisztracio.php">Regisztráció</a>
                    <a href="belépés.php">Belépés</a>
                    <div class="dropdown">
                        <button class="dropbtn" style="background-color: lightgray; color: black">Termékek
                        </button>
                        <div class="dropdown-content">
                            <a href="Kulacsok.php">Kulacsok</a>
                            <a href="Termoszok.php">Termoszok</a>
                        </div>
                    </div>
                    <a href="megrendeles.php"><img src="image/kosar.png" alt="kosar" style="width:30px;height:30px;"></a>
                </div>
                <div id="page-container">
                    <div id="content-wrap">
            </div>
        </div>

    <footer id="normal-footer"><?php include "./footer.php" ?></footer>

</body>

</html>