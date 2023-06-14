<?php
include("db.php");

if(strlen($_POST['nom'])>= 1 && strlen($_POST['cognom'])>= 1){
        $nom= trim($_POST['nom']);
        $cognom=trim($_POST['cognom']);
        $email=trim($_POST['email']);
        $consulta1=$connexio->prepare("SELECT nom, cognom, email FROM participant");
        $consulta1-> execute();
        $error=false;
        foreach($consulta1 as $row){
            if($row['nom']==$_POST['nom']){
                ?>
                <h3>Error! Usuari ja introduit!!!</h3>
                <?php
                $error=true;
            }else{
            } 
        }
        if($error==false){
            $consulta2=$connexio->prepare("INSERT INTO participant(nom, cognom,email) VALUES (?,?,?)");
            $consulta2->execute(array($nom,$cognom,$email));
            ?>
            <h3>T'has inscrit correctament!</h3>
            <?php
            header("Location: assoliments.php");
        }
     } else{
        ?>
        <h3>Completi els camps correctament!</h3>
        <?php
    }
?>