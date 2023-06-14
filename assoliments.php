<!DOCTYPE html>
<html lang="ca">
<head>
    <title>Accés</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
    include("db.php");

            ?>
        <form action="afegirAssoliments.php" method="post">

            <select name="select_participant">
            <option value="0">Selecciona un nom:</option>
    
            <?php          
                $query = $connexio->prepare("SELECT nom,email FROM participant");

                $query->execute();

                $data = $query->fetchAll();

                foreach ($data as $valores) :

                    echo '<option name="nom" value="'.$valores['email'].'">'.$valores['nom'].'</option>';
                

                endforeach;

                ?>
            </select>
                    
            <select name="select_via">
            <option value="0">Selecciona via:</option>
    
            <?php          
                $query = $connexio->prepare("SELECT nom FROM via");

                $query->execute();

                $data = $query->fetchAll();

                foreach ($data as $valores) :

                    echo '<option name="via" value="'.$valores['nom'].'">'.$valores['nom'].'</option>';
                

                endforeach;

                ?>
            </select>
            <label>Introdueix la data:</label>
            <input type="date" name="date" placeholder="date"/>
            <label>Encadenat:</label>
            <input type="checkbox" name="encadenat" value="1" placeholder="encadenat"/>
            <label>Primer:</label>
            <input type="checkbox" name="primer" value="1" placeholder="primer"/>
            
            
            <select name="select_assegurador">
            <option value="0">Selecciona un assegurador:</option>
    
            <?php          
                $query = $connexio->prepare("SELECT nom,email FROM participant");

                $query->execute();

                $data = $query->fetchAll();

                foreach ($data as $valores) :

                    echo '<option name="nom" value="'.$valores['email'].'">'.$valores['nom'].'</option>';
                

                endforeach;

                ?>
            </select><br><br>





            <button>Afegir assoliment</button>
        </form>

        <?php
                    
    ?>
</body>
</html>


