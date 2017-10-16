<?php
//print_r($_GET);
//$_GET['img'] = null;
//print_r($_GET);
if(isset($_GET['img']) && $_GET['img'] == "gif") {
    $images = glob('images/*.gif');
}
if(isset($_GET['img']) && $_GET['img'] == "png") {
    $images = glob('images/*.png');
}
if(isset($_GET['img']) && $_GET['img'] == "jpg") {
    $images = glob('images/*.{jpg,jpeg}',GLOB_BRACE);
}
if(isset($_GET['img']) && $_GET['img'] == "all") {
    $images = glob('images/*.{gif,jpg,jpeg,png}',GLOB_BRACE);
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
</head>
<body>
<a href="?img=png">Fichiers Png</a> <a href="?img=jpg">Fichiers Jpg</a> <a href="?img=gif">Fichiers Gif</a> <a href="?img=all">Voir toutes les images</a>
<hr>

<?php foreach($images as $image) : ?>
   <div>
    <img width="250" src="<?php echo $image ?>" alt="salut bob">
</div>
<?php endforeach; ?>


</body>
</html>