<?php
include("db.php");

    $participant = trim($_POST["select_participant"]);
    $via = trim($_POST['select_via']);
    $date = trim($_POST['date']);
    $encadenat = isset($_POST['encadenat']) ? 1 : 0;
    $primer = isset($_POST['primer']) ? 1 : 0;
    $assegurador = trim($_POST['select_assegurador']);

    if ($participant === $assegurador) {
        echo "<h3>Error! L'assegurador no pot ser el mateix que el participant.</h3>";
        exit;
    }

    $consulta1 = $connexio->prepare("SELECT intent FROM assoliment WHERE participant = ? AND via = ? ORDER BY intent DESC LIMIT 1");
    $consulta1->execute(array($participant, $via));
    $row = $consulta1->fetch();

    if ($row !== false) {
        $intent = $row['intent'] + 1;
    } else {
        $intent = 1;
    }

    $consulta2 = $connexio->prepare("INSERT INTO assoliment(participant, via, intent,dates, encadenat, primer, assegurador) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $consulta2->execute(array($participant, $via, $intent, $date, $encadenat, $primer, $assegurador));


    header("Location: assoliments.php");
?>
