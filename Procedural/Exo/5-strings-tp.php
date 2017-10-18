<!doctype HTML>
<html>
<head>
    <meta charset="utf-8">
    <title> Les principales fonctions des chaînes de caractères</title>
</head>
<body>

<?php
/** Voici un première exemple de fonction de chaîne de caractère
 * Objectif: Transformer toutes les lettres d'une chaîne en majuscule
 */

$minToMaj = "voiture";

echo "<h2>Objectif: Transformer toutes les lettres d'une chaîne en majuscule</h2>";
echo $minToMaj . "<br />";
echo "devient => ";
echo strtoupper($minToMaj);

echo "<hr>";
$lenght = "je suis";
echo strlen($lenght);

?>

Exercice:
<?php
/**
 * En vous référent à la documentation en ligne de PHP (php.net), transformer les chaines de caractères suivantes
 * selon les directives indiquées
 *
 *
 * 1_ Transformer une chaîne en majuscule en minuscule
 * 2_ Transformer en majuscule le premier caractère d'une chaîne
 * 3_ Transformer en majuscule le premier caractère de chaque mot d'une chaîne
 * 4_ Calculer le nombre de caractère présent dans une chaîne
 * 5_ Supprimer les espaces en début et fin d'une chaîne
 * 6_ Supprimer la première lettre d'une chaîne
 * 7_ Remplacer des caractères présents dans une chaîne par d'autres caractères
 *
 *
 *
 */
?>
<h6>Exo n°1</h6>
<?php $majToMin = "GOVA";
echo $majToMin = strtolower($majToMin) ?>
<h6>Exo n°2</h6>
<?= $minToMaj = ucfirst($minToMaj) ?>
<h6>Exo n°3</h6>
<?php $everyUp = "Transformer toutes les lettres d'une chaîne en majuscule";
echo $everyUp = ucwords($everyUp) ?>
<h6>Exo n°4</h6>
<?= $stringCount = strlen($everyUp) ?>
<h6>Exo n°5</h6>
<?php $spaceString = "  bablablabla queleques mots et voila      ";
echo $spaceString = trim($spaceString) ?>
<h6>Exo n°6</h6>
<?= substr($spaceString, 1) ?>
<h6>Exo n°7</h6>
<?= str_replace("e", "i", $spaceString); ?>


</body>
</html>