<!doctype HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Les fonctions de tableaux</title>
</head>
<body>
<h1>Les fonctions de tableaux</h1>
<?php
/**
 * EXERCICE: Recherchez les fonctions Array dans la documentation PHP (php.net) et réalisez les opérations suivantes
 * 1_ Créez un tableau de type numérique et stockez des valeurs de type entiers
 * 2_ Comptez le nombre de valeurs stockées dans ce tableau
 * 3_ Affichez la valeur maximale stockée dans ce tableau
 * 4_ Affichez la valeur minimale stockée dans ce tableau
 * 5_ Classez dans un ordre croissant les valeurs de ce tableau.
 * Affichez votre résulat à l'aide d'une méthode de debug
 * 6_ Classez dans un ordre décroissant les valeurs de ce tableau.
 * Affichez votre résulat à l'aide d'une méthode de debug
 * 7_ Faites la somme des valeurs de types entiers contenues dans ce tableau, et afficher le résulat contenu dans une variable
 * 8_ Rassemblez les valeurs d'un tableau numérique en une chaîne de caractères
 * 9_ Transformez une chaîne de caractères en tableau numérique
 * 10_ Vérifiez si une valeur existe dans votre tableau (! retourne une valeur booléenne)
 * 11_ Créer un sous-tableau qui contient seulement quelques valeurs d'un tableau principal
 * 12_ Fusionner deux tableaux en un seul
 * 13_ Comparer deux tableaux et afficher leurs valeurs différentes dans un troisième tableau
 * 14_ Créer un tableau qui contient des valeurs en doublons. Ensuite, affichez ce tableau avec une méthode de débug sans les doublons
 */
?>
<h3>Exo N°1</h3>
<?php var_dump($array1 = [55, 97, 41, 02, 7]) ?>
<h3>Exo N°2</h3>
<?= $exo2 = count($array1) ?>
<h3>Exo N°3</h3>
<?= $exo3 = max($array1) ?>
<h3>Exo N°4</h3>
<?= $exo4 = min($array1) ?>
<h3>Exo N°5</h3>
<?php
$exo5 = sort($array1, SORT_ASC).'<br>';
print_r($array1);
?>
<h3>Exo N°6</h3>
<?php $exo6 = sort($array1, SORT_DESC);
print_r($array1) ?>
<h3>Exo N°7</h3>
<?= array_sum($array1) ?>
<h3>Exo N°8</h3>
<?= $exo8 = implode(" ", $array1) ?>
<h3>Exo N°9</h3>
<?php $exo9 = explode(" ", $exo8);
print_r($exo9) ?>
<h3>Exo N°10</h3>
<?= $exo10 = in_array(55, $array1);?>
<h3>Exo N°11</h3>
<?php print_r($exo11 = [22,18,[15,13],[5,2],[17,15]]) ?>
<h3>Exo N°12</h3>
<?php $exo12 = array_merge($array1, $exo11);
print_r($exo12)?>
<h3>Exo N°13</h3>
<?php $exo13 = array_diff($array1, $exo9);
print_r($exo13)?>
<h3>Exo N°14</h3>
<?php
$exo14 = $array1;
$exo141 = array_merge($exo14, $array1);
print_r(array_unique($exo141));
?>

</body>
</html>