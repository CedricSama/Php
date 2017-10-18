<?php
session_start();
if(isset($_SESSION['logged']) == false){
    header('Location: index.php?error=4');
};
$civilCookie = isset($_COOKIE['etat_civil'])? $_COOKIE['etat_civil'] : false;
$hobbiesCookie = isset($_COOKIE['passions'])? unserialize($_COOKIE['passions']) : null;
$choixPassion = ["cinema", "sport", "theatre", "concert", "voyage"];
$success = isset($_GET['success'])? $_GET['success']: null
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
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    [endif]-->
    <style>
        .success{
            background: #51be3e;
            padding: 10px;
            color: white;
            text-align: center;
            border-radius: 3px;
            box-shadow: #575757 1px 1px 3px;
            margin-bottom: 20px;
        }
    </style>
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
                    <li class="active">
                        <a href="a-propos-de-vous.php">A propos de vous</a>
                    </li>
                    <?php
                    if($hobbiesCookie != null) :
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
                    endif;
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container" style="margin-top: 70px">
    <div class="row">
        <div class="span9">
            <div class="page-header">
                <h1>Vos hobbies</h1>
            </div>
            <ul class="thumbnails">
                <?php if($success == 1): ?>
                <div class="success">
                    <p>Bienvenue !</p>
                </div>
                <?php endif; ?>
                <?php
                if($hobbiesCookie != null) :
                    foreach($hobbiesCookie as $passion) :
                        if($passion == "cinema"):?>
                            <li class="span3">
                                <div class="thumbnail">
                                    <img src="http://placehold.it/260x180" alt="">
                                    <div class="caption">
                                        <h3>Cinéma</h3>
                                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit
                                            non mi
                                            porta
                                            gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id
                                            elit.</p>
                                        <p><a href="cinema.php" class="btn btn-info"> Accès rubrique Cinéma</a></p>
                                    </div>
                                </div>
                            </li>
                        <?php endif;
                        if($passion == "sport"):?>
                            <li class="span3">
                                <div class="thumbnail">
                                    <img src="http://placehold.it/260x180" alt="">
                                    <div class="caption">
                                        <h3>Sports</h3>
                                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit
                                            non mi
                                            porta
                                            gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id
                                            elit.</p>
                                        <p><a href="sport.php" class="btn btn-info"> Accès rubrique Sport</a></p>
                                    </div>
                                </div>
                            </li>
                        <?php endif;
                        if($passion == "theatre"):?>
                            <li class="span3">
                                <div class="thumbnail">
                                    <img src="http://placehold.it/260x180" alt="">
                                    <div class="caption">
                                        <h3>Théâtre</h3>
                                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit
                                            non mi
                                            porta
                                            gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id
                                            elit.</p>
                                        <p><a href="theatre.php" class="btn btn-info"> Accès rubrique Théatre</a></p>
                                    </div>
                                </div>
                            </li>
                        <?php endif;
                        if($passion == "concert"):?>
                            <li class="span3">
                                <div class="thumbnail">
                                    <img src="http://placehold.it/260x180" alt="">
                                    <div class="caption">
                                        <h3>Concerts</h3>
                                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit
                                            non mi
                                            porta
                                            gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id
                                            elit.</p>
                                        <p><a href="concert.php" class="btn btn-info"> Accès rubrique Concerts</a></p>
                                    </div>
                                </div>
                            </li>
                        <?php endif;
                        if($passion == "voyage"):?>
                            <li class="span3">
                                <div class="thumbnail">
                                    <img src="http://placehold.it/260x180" alt="">
                                    <div class="caption">
                                        <h3>Voyages</h3>
                                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit
                                            non mi
                                            porta
                                            gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id
                                            elit.</p>
                                        <p><a href="voyage.php" class="btn btn-info"> Accès rubrique Voyages</a></p>
                                    </div>
                                </div>
                            </li>
                        <?php endif;
                    endforeach;
                endif; ?>
            </ul>
        </div>
        <?php if(!$civilCookie) : ?>
            <div class="span3">
                <img src="img/meetic-ads.gif" alt=""/>
            </div>
            <div class="span3">
                <img src="http://avocat-gc.com/divorce/sites/default/files/slides/divorce-amiable-03.jpg" alt=""/>
            </div>
        <?php endif; ?>
        <?php if($civilCookie == "celibataire") : ?>
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
    <!-- Footer
    ================================================== -->
    <footer class="footer">
        <p> Footer</p>
    </footer>
</div><!-- /container -->
<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
</body>