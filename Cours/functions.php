<?php
function somme($ch1, $ch2)
{
    return $ch1 + $ch2;
}

echo somme(4, 5);
?>
<br>
<br>
<?php
function mySomme()
{
    $mysomme = 0;
    $argument = func_get_args();
    $totalArgs = count($argument);
    //print_r($argument);
    if($totalArgs < 2){
        $mysomme = "Il faut au moins deux arguments pour activer cette fonction";
        return $mysomme;
    }else{
        foreach($argument as $n){
            if(is_numeric($n)){
                $mysomme += $n;
            }else{
                $mysomme = "Il faut des entier ou floats  !";
            }
        }
        return $mysomme;
    }
}

/*function correctionSum(){
    $numArg = func_num_args();
    $total = array_sum($numArg);
    return $total;
}*/
echo mySomme("1", "2", "5");
?>
<br>
<br>
<?php
/*
$_GET = null;*/
//print_r($_GET);
if(isset($_GET['img']) && $_GET['img'] == "jpg"){
    $images = glob("img/*.{jpg, jpeg}", GLOB_BRACE);
}

if(isset($_GET['img']) && $_GET['img'] == "png"){
    $images = glob("img/*.png");
}

if(isset($_GET['img']) && $_GET['img'] == "gif"){
    $images = glob("img/*.gif");
}

if(isset($_GET['img']) && $_GET['img'] == "all"){
    $images = glob("img/*.{jpg, jpeg, png, gif}", GLOB_BRACE);
}


//print_r($im);}
/*function afficherJpeg()*/
/*{*/
/*foreach (glob("./img/*.jpg") as $filename) {
    echo "$filename occupe " . filesize($filename) . "\n";
}

glob();
$im = './img/ok.png';
return $im;*/
/* foreach (glob("*.txt") as $filename) {
     echo "$filename occupe " . filesize($filename) . "\n";
 }*/
//$dir = "./img/ikaruga.jpg";
/*}*/

/*function afficherPng(){}
function afficherGif(){}
function afficherAll(){}
$type=false;
function open_image ($file) {
    //detect type and process accordinally
    global $type;
    $size=getimagesize($file);
    switch($size["mime"]){
        case "image/jpeg":
            $im = imagecreatefromjpeg($file); //jpeg file
            break;
        case "image/gif":
            $im = imagecreatefromgif($file); //gif file
            break;
        case "image/png":
            $im = imagecreatefrompng($file); //png file
            break;
        default:
            $im=false;
            break;
    }
    return $im;
}*/
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Php Initiation</title>
    <style>
        hr {
            width: 100%;
            height: 1px;
            background: black;
        }
        img {
            width: 175px;
        }
    </style>
</head>
<body>

<a title="Jpeg" href="?img=jpg">Jpeg</a>
<a title="Png" href="?img=png">Png</a>
<a title="Gif" href="?img=gif">Gif</a>
<a title="All" href="?img=all">All</a>
<hr>
<a href="?img=png">Fichiers Png</a>
<a href="?img=jpg">Fichiers Jpg</a>
<a href="?img=gif">Fichiers Gif</a>
<a href="?img=all">Voir toutes les images</a>

<?php foreach($images as $image) : ?>
    <div>
        <img src="<?php echo $image ?>">
    </div>
<?php endforeach; ?>
</body>
</html>
