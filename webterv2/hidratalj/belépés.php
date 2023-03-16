<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Belépés</title>
    <link rel="stylesheet" href="css.css">
    <link rel="icon" type="image/x-icon" href="image/icon.png">
</head>
<body>

        <div class="menu" id="sticky">
            <a href="index.php">Főoldal</a>
            <a href="regisztracio.php">Regisztráció</a>
            <a href="belépés.php" style="background-color: lightgray; color: black">Belépés</a>
            <div class="dropdown">
                <button class="dropbtn">Termékek
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
    <div>
    <form method="POST">
        <fieldset>
            <legend>Bejelentkezés</legend>
            <label for="email">E-mail cím:</label>
            <input type="email" id="email" name="email" required/> <br/><br/>
            <label for="jelszo">Jelszó:</label>
            <input type="password" id="jelszo" name="jelszo" required/> <br/><br/>
        </fieldset>
        <br><br>
        <input type="submit" formmethod="post" id="bejelentkezes" value="Bejelentkezés"/>

    </form>
    </div>
    </div>
</div>
</body>
<footer id="normal-footer"><?php include "./footer.php" ?></footer>

</html>