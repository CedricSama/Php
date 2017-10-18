<?php
$hobbiesCookie = isset($_COOKIE['passions'])? unserialize($_COOKIE['passions']) : null;
$civilCookie = isset($_COOKIE['etat_civil'])? $_COOKIE['etat_civil'] : false;
$choixPassion = ["cinema", "sport", "theatre", "concert", "voyage"];
session_start();
if(isset($_SESSION['logged']) == false){
    header('Location: index.php?error=7');
};
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Mes-passions.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
<!--
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
-->
    <!--[endif]-->
</head>
<body data-spy="scroll" data-target=".subnav" data-offset="50">
<!-- Navbar
================================================== -->
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" href="vos-passions.php">Mes-passions.com</a>
            <a href="logout.php" name="disconnected"><button type="button" class="btn btn-danger">Se Déconnecté</button></a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                <?php
                foreach($hobbiesCookie as $passion) :
                    for($i = 0; $i < count($choixPassion); $i++):
                        if($passion == $choixPassion[$i]): ?>
                            <li class="active">
                                <a href="./<?= $choixPassion[$i] ?>.php"><?= $choixPassion[$i] ?></a>
                            </li>
                            <?php
                        endif;
                    endfor;
                endforeach;
                ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container" style="margin-top: 70px">
    <div class="row">
        <div class="span9">
            <div class="hero-unit">
                <h1>Sport</h1>
                <p>Tout savoir sur le sport</p>
                <p>
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                    labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores
                    et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                    labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores
                    et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                    labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores
                    et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                    <a href="#" class="thumbnail">
                        <img src="http://placehold.it/260x180" alt="">
                    </a>
                    Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum
                    dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit
                    praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit
                    amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna
                    aliquam erat volutpat.
                </p>
            </div>
        </div>
        <?php if(!$civilCookie) : ?>
            <div class="span3">
                <img src="img/meetic-ads.gif" alt=""/>
            </div>
            <div class="span3">
                <img src="http://avocat-gc.com/divorce/sites/default/files/slides/divorce-amiable-03.jpg" alt=""/>
            </div>
        <?php endif; ?>
        <?php if($civilCookie == "celibataire" || $civilCookie == "divorce" || $civilCookie == "veuf") : ?>
            <div class="span3">
                <img src="img/meetic-ads.gif" alt=""/>
            </div>
        <?php endif; ?>
        <?php if($civilCookie == "marie") : ?>
            <div class="span3">
                <img src="http://avocat-gc.com/divorce/sites/default/files/slides/divorce-amiable-03.jpg" alt=""/>
            </div>
        <?php endif; ?>
    </div>
</div>
<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
</body>