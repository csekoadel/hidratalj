<?function felhasznalo_torol($email) {
    // Felhasználók beolvasása a fájlból
    $fiokok = beolvas_felhasznalok("felhasznalok.txt");
$torlendo_felhasznalo = $fiokok[$torlendo_felhasznalo_index];
print_r($torlendo_felhasznalo);

    // Felhasználó keresése a tömbben
    $torlendo_index = -1;
    foreach ($fiokok as $index => $fiok) {
        if ($fiok['email'] == $email) {
            $torlendo_index = $index;
            break;
        }
    }

    // Ha találtunk ilyen felhasználót, töröljük
    if ($torlendo_index >= 0) {
        unset($fiokok[$torlendo_index]);
        // Mentsük el az új adatokat a fájlba
        $fajl = fopen("felhasznalok.txt", "w");
        foreach ($fiokok as $fiok) {
            fwrite($fajl, serialize($fiok) . "\n");
        }
        fclose($fajl);
        return true;
    } else {
        return false;
    }
}

?>