<?php
print_r($_GET);
if(isset($_GET['name']) == false){
    $prenom = null;
}else{
    $prenom = $_GET['name'];
}

if(isset($_GET['age']) && false){
    $age = null;
}else{
    $age = $_GET['age'];
}
$age = true;
if(isset($_GET['name']) == false || empty($_GET['name']) || is_numeric($_GET['name'])|| preg_match('~[0-9]~', $_GET['name'])){
    $prenom = false;
}else{
    $prenom = $_GET['name'];
}
$a = false;
$b = false;
$victime = false;
if(isset($_GET['age']) && $_GET['age'] > 18 && $_GET['age'] < 80 && $_GET['statut'] == "etudiant"){
    $victime = true;
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
<?php if($prenom != false): ?>
    <h1>Bienvenue <?= $prenom ?></h1>
<?php else: ?>
    <p class="error">Merci de saisir un prénom</p>
<?php endif ?>
<?php if(isset($_GET['age']) && ($_GET['age']) < 12){
    $age = false;
    $a = true;
    echo '<p class="error">Vous devez avoir au moins 12 ans pour consulter cette page</p>';
}elseif(isset($_GET['age']) && ($_GET['age']) > 80){
    $age = false;
    $b = true;
    echo "<p class='error'>Etes-vous sûr d'être si vieux ?</p>";
} ?>
<?php /*if($prenom == false): */?>
<?php if(!$prenom): ?>
    <p class="error">Merci de saisir un prénom</p>
<?php endif; ?>
<?php /*if($a == true) : */?>
<?php if($a) : ?>
    <p class="error">Vous devez avoir au moins 12 ans pour consulter cette page</p>
<?php endif; ?>
<?php /*if($b == true) : */?>
<?php if($b) : ?>
    <p class='error'>Etes-vous sûr d'être si vieux ?</p>
<?php endif; ?>
<?php /*if($victime == true): */?>
<?php if($victime): ?>
    <p>Super concert tahi !</p>
    <img src="http://static1.villaschweppes.com/articles/6/65/16/@/23648-die-antwoord-le-28-janvier-au-zenith-article_top-1.jpg" alt="DieAntwood" style="width: 500px">
<?php endif; ?>
</body>
</html>
