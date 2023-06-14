<!DOCTYPE html>
<html lang="ca">
<head>
    <title>Accés</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="container" id="container">
    <div class="form-container sign-in-container">
        <form action="registre.php" method="post">
            <h1>Registre</h1>
            <span>Introdueix les teves credencials:</span>
            <input type="hidden" name="method" value="signin"/><br><br>
            <input type="text" name="nom" placeholder="nom"/><br><br>
            <input type="text" name="cognom" placeholder="cognom"/><br><br>
            <input type="text" name="email" placeholder="email"/><br><br>

            <button>Registra't</button>
        </form>
    </div>
</body>
</html>