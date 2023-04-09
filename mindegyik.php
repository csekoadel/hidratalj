<?php

function betoltott_felhasznalok($filename)
    {
    $felhasznalok = [];                  // ez a tömb fogja tartalmazni a regisztrált felhasználókat

    $file = fopen($filename, "r");    // fájl megnyitása olvasásra
    if ($file === FALSE)          // hibakezelés
        die("HIBA: A fájl megnyitása nem sikerült!");

    while (($sor = fgets($file)) !== FALSE) {
        $felhasznalo = unserialize($sor);
        $felhasznalok[] = $felhasznalo;

    }

    fclose($file);
    return $felhasznalok;
    }

// a regisztrált felhasználók adatait fájlba író függvény

function mentett_felhasznalok($filename, $felhasznalok)
    {
    $file = fopen($filename, "w");
    if ($file === FALSE)
        die("HIBA: A fájl megnyitása nem sikerült!");

    foreach ($felhasznalok as $felhasznalo) {
        $serialized_user = serialize($felhasznalo);
        fwrite($file, $serialized_user . "\n");
    }
    fclose($file);
    }
    ?>
