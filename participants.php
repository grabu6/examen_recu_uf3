<!DOCTYPE html>
<html lang="ca">
<head>
    <title>Accés</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin-left: 100px;
            margin-top: 100px;
            font-family: Arial, sans-serif;
        }

        .participant {
            margin-bottom: 20px;
        }

        .participant h2 {
            margin: 0;
            font-size: 18px;
        }

        .vies {
            margin-top: 10px;
            list-style-type: none;
            padding-left: 0;
        }

        .vies li {
            margin-bottom: 5px;
        }

        .encadenada {
            color: blue;
        }

        .primer-intent {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <?php          
                include("db.php");
            ?>
            
            <h2>Participants:</h2>
            <?php
                $query = $connexio->prepare("SELECT nom FROM participant ORDER BY nom ASC");
                $query->execute();
                $participants = $query->fetchAll();

                foreach ($participants as $participant) {
                    echo "<h3>" . $participant['nom'] . "</h3>";

                    $query = $connexio->prepare("SELECT via, encadenat, primer,intent FROM assoliment WHERE participant = ? ORDER BY via ASC");
                    $query->execute(array($participant['nom']));
                    $vies = $query->fetchAll();
                    
                    echo "<ul>";
                    foreach ($vies as $via) {
                        $class = '';
                        if ($via['encadenat'] == true && $via['primer'] == true) {
                            $class = 'encadenada';
                        } elseif ($via['intent'] == 1) {
                            $class .= ' primer-intent';
                        }

                        echo "<li class='$class'>" . $via['via'] . "</li>";
                    }
                    echo "</ul>";
                }
            ?>
        </div>
    </div>
</body>
</html>
