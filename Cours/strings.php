<?php $prenom = "cédric";
$nom = "salaün";
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
<?php // echo "<h1>Bienvenue Cédric</h1>" ?>
<!--<h1>Bienvenue <?php /*echo $prenom */?></h1>-->
<!--syntax plus rapide-->
<h1>Bienvenue <?= $prenom." ".$nom ?></h1>
<h1>Bienvenue <?= $prenom?> <?=$nom ?></h1>
<h1>Bienvenue <?= ucfirst($prenom)?> <?=ucfirst($nom)?></h1>
</body>
</html>