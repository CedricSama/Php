<!doctype HTML>
<html>
<head>
    <title>
        Fonctions utiles sur les nombres
    </title>
</head>
<body>
<?php
/**
 * EXERCICE: rercher les fonctions "math" dans la documentation de PHP (php.net) et réaliser les opérations suivantes
 * 1_ Affichez la valeur absolue d'un nombre
 * 2_ Calculez la racine carré d'un nombre
 * 3_ Affichez le reste d'une division (modulo)
 * 4_ Générez un nombre aléatoire
 * 5_ Générez un nomree aléatoire entre 15 et 800
 * 6_ Arrondissez la valeur de $float
 * 7_ Arrondissez au nombre supérieur la valeur de $float
 * 8_ Arrondissez au nombre inférieur la valeur de $float
 */
?>
<h3>Exo n°1</h3>
<?php $exo1 = -4.56;
echo $exo1 = abs($exo1) ?>
<h3>Exo n°2</h3>
<?= sqrt($exo1) ?>
<h3>Exo n°3</h3>
<?= fmod($exo1, 2) ?>
<h3>Exo n°4</h3>
<?= rand() ?>
<h3>Exo n°5</h3>
<?= rand(15, 800) ?>
<h3>Exo n°6</h3>
<?= $float = round($exo1) ?> <br><br>
<?= $float = round($exo1, 0) ?>
<h3>Exo n°7</h3>
<?php $exo2 = 6.7;
echo $exo7 = ceil($exo2) ?>
<h3>Exo n°8</h3>
<?= $exo8 = floor($exo2) ?>
<h3>Exo n°9</h3>
<?= $uniq_id = uniqid($exo2) ?>



</body>
</html>