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
    <a href="belépés.php">Belépés</a>
    <div class="dropdown">
        <button class="dropbtn">Termékek
        </button>
        <div class="dropdown-content">
            <a href="Kulacsok.php">Kulacsok</a>
            <a href="Termoszok.php">Termoszok</a>
        </div>
    </div>
    <a href="megrendeles.php" style="background-color: lightgray"><img src="image/kosar.png" alt="kosar" style="width:30px;height:30px;"></a>
</div>
<div id="page-container">
    <div id="content-wrap">
        <h1 style="position: absolute;left:43%; top:17%; z-index: 9;text-align:center;display:inline-block">Kosár tartalma:</h1>
        <div style="overflow-x:auto;">

            <table>
                <thead>
                <tr>

                    <th id="termeknev" colspan="2">Kiválasztott termék</th>
                    <th id="db">Darabszám</th>
                    <th id="ar">Ár</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td headers="termeknev">Kép</td>
                    <td headers="termeknev">Termosz1</td>
                    <td headers="db">1 db</td>
                    <td headers="ar" >3500 Ft</td>
                </tr>
                <tr>
                    <td headers="termeknev">Kép</td>
                    <td headers="termeknev">Kulacs2</td>
                    <td headers="db">2 db</td>
                    <td headers="ar">2600 Ft</td>
                </tr>
                <tr>
                    <td style="text-align: center; border: none; " colspan="4"><button id="bejelentkezes">Megrendelés</button></td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>
</body>
<footer id="footer"><?php include "./footer.php" ?></footer>

</html>

