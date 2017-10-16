<?php
session_start();
$login = false;
if(!isset($_SESSION['is_logged']) || !$_SESSION['is_logged']){
    header('Location: post.php?error=3');
}else{
    $login = isset($_SESSION['login'])? $_SESSION['login'] : null;
}
$etat_civil = isset($_COOKIE['etat_civil'])? $_COOKIE['etat_civil'] : null;
$animaux = isset($_COOKIE['animaux'])? unserialize($_COOKIE['animaux']) : null;
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Bienvenue <?= $login ?></h1>
<a href="logout.php"><input type="button" value="Quitter"></a>
<form action="cookie.php" method="post">
    <p>
        <label for="etat_civil">Votre état civil</label>
        <select name="etat_civil" id="etat_civil">
            <option value="celibataire">Célibataire</option>
            <option value="marie">Marié(e)</option>
            <option value="veuf">Veuf / Veuve</option>
            <option value="complique">C'est compliqué</option>
        </select>
    </p>
    <h3>Vos animaux de compagine</h3>
    <p>
        <label>
            <input type="checkbox" name="animaux[]" value="chat"> Chat
        </label>
        <label>
            <input type="checkbox" name="animaux[]" value="chien"> Chien
        </label
        ><label>
            <input type="checkbox" name="animaux[]" value="loups"> Loups
        </label>
        <label>
            <input type="checkbox" name="animaux[]" value="hippocampe"> Hippocampe
        </label>
    </p>
    <p><input type="submit" value="valider"></p>
</form>
<?php if(count($animaux) > 0) : ?>
    <img src="https://www.wanimo.com/images_media/blocs/0-generique/250x250/bloc_bienvenue.gif">
<?php endif; ?>
</body>
</html>