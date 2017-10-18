<?php
$error = isset($_GET['error'])? $_GET['error'] : false;
print_r($_GET['error']);
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Identification</title>
    <style>
        .error {
            background: #a61b10;
            color: white;
            font-size: large;
            padding: 10px;
            text-align: center;
        }
        .notice{
            background: #51be3e;
            color: #ffcfde;
            font-size: large;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
<h1>Identifiez-vous</h1>
<?php if($error == 1): ?>
    <div class="error">
        <p>Le champ login est obligatoire</p>
    </div>
<?php endif; ?>
<?php if($error == 2): ?>
    <div class="error">
        <p>Le mots de passe est invalide</p>
    </div>
<?php endif; ?>
<?php if($error == 3): ?>
    <div class="error">
        <p>Vous avez été redirigé car vous n'avez pas le droit de consulter cette page !</p>
    </div>
<?php endif; ?>
<?php if($error == 4): ?>
    <div class="notice">
        <p>Vous avez été déconecté, A bientôt !</p>
    </div>
<?php endif; ?>
<form action="post-read.php" method="post">
    <p>
        <label for="login">Votre Login</label>
        <input type="text" name="login" id="login">
    </p>
    <p>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    </p>
    <p>
        <input type="submit" value="Se connecter">
    </p>
</form>
</body>
</html>
