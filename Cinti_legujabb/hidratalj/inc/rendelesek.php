<!DOCTYPE html>
<html lang="hu">

<div id="page-container">
    <div id="content-wrap">
        <h1 style="position: relative; z-index: 9;text-align:center;display:inline-block">Összes rendelés:</h1>
        <div style="overflow-x:auto;">

<?php  print_r($_SESSION['kosar']);
?>
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
              
                </tbody>
            </table>
        </div>

    </div>
</div>

</html>

