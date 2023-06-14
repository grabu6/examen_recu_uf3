<?php
include("db.php");

if (isset($_POST['delete_assoliments'])) {
    $consulta1 = $connexio->prepare("DELETE FROM assoliment");
    $consulta1->execute();
}

if (isset($_POST['delete_participants'])) {
    $consulta2 = $connexio->prepare("DELETE FROM participant");
    $consulta2->execute();
}

if (isset($_POST['delete_vies_sectors'])) {
    $consulta3 = $connexio->prepare("DELETE FROM via");
    $consulta3->execute();

    $consulta4 = $connexio->prepare("DELETE FROM sector");
    $consulta4->execute();
}

if (isset($_POST['insert_vies_sectors'])) {
    
    // $consulta5 = $connexio->prepare("INSERT INTO sector (nom) VALUES (?)");
    // $consulta5->execute(array('Sector 1'));

    // $consulta6 = $connexio->prepare("INSERT INTO via (nom, sector_id) VALUES (?, ?)");
    // $consulta6->execute(array('Via 1', 1));
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <title>Debug</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h2>Accions:</h2>
    <form method="POST">
        <input type="submit" name="delete_assoliments" value="Eliminar tots els assoliments">
        <input type="submit" name="delete_participants" value="Eliminar tots els participants">
        <input type="submit" name="delete_vies_sectors" value="Esborrar totes les vies i sectors">
        <input type="submit" name="insert_vies_sectors" value="Introduir automàticament vies i sectors">
    </form>
</body>
</html>
