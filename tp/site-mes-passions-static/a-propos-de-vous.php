<?php
session_start();
if(isset($_SESSION['logged']) == false){
    header('Location: index.php?error=7');
};
$error = isset($_GET['error'])? $_GET['error'] : null;
$civilCookie = isset($_COOKIE['etat_civil'])? $_COOKIE['etat_civil'] : false;
$hobbiesCookie = isset($_COOKIE['passions'])? unserialize($_COOKIE['passions']) : null;
$choixPassion = ["cinema", "sport", "theatre", "concert", "voyage"];
$success = isset($_GET['success'])? $_GET['success'] : null
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
    <!--<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    [endif]-->
    <style>
        .error {
            background: #ea4235;
            padding: 10px;
            color: white;
            text-align: center;
            border-radius: 3px;
            box-shadow: #575757 1px 1px 3px;
            margin-bottom: 25px;
        }
        .success {
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
            <a href="logout.php" name="disconnected">
                <button type="button" class="btn btn-danger">Se Déconnecté</button>
            </a>
        </div>
    </div>
</div>
<div class="container" style="margin-top: 70px">
    <div class="row">
        <div class="span9">
            <div class="page-header">
                <h1>Bienvenue !</h1>
            </div>
            <?php if($error == 1): ?>
                <div class="error">
                    <p>Veillez saisir au moins un hobbie.</p>
                </div>
            <?php endif; ?>
            <?php if($success == 1): ?>
                <div class="success">
                    <p>Bienvenue !</p>
                </div>
            <?php endif; ?>
            <h2>A propos de vous:</h2>
            <p>Afin d'améliorer votre visite, nous souhaiterions en savoir plus sur vous.</p>
            <!-- A: on créé un formulaire simple pour récupérer les infos sur le visiteur-->
            <form action="cookies.php" method="post">
                <!-- Si l'attribut action reste vide, le formulaire sera validé sur la même page -->
                <!-- Select simple (1 choix)-->
                Votre état civil ? <br/>
                <select title="civil" name="civil">
                    <option value=""></option>
                    <option value="celibataire">Célibataire</option>
                    <option value="marie">Marié(e)</option>
                    <option value="divorce">Divorcé(e)</option>
                    <option value="veuf">veuf ou veuve</option>
                </select><br/>
                <!--Select multiple (plusieurs choix)-->
                Quels sont vos hobbies ? <br/>
                <label class="form-check-label">
                    <input class="form-check-input" value="cinema" name="hobbies[]" type="checkbox"
                        <?php
                        if($hobbiesCookie != null) :
                            foreach($hobbiesCookie as $passion) :
                                ?><?php if($passion == "cinema"): ?> checked
                            <?php endif; ?><?php endforeach; endif; ?>>Cinéma
                </label>
                <label class="form-check-label">
                    <input class="form-check-input" value="sport" name="hobbies[]" type="checkbox" <?php
                    if($hobbiesCookie != null) :
                        foreach($hobbiesCookie as $passion) :
                            ?><?php if($passion == "sport"): ?> checked
                        <?php endif; ?><?php endforeach; endif; ?>>Sport
                </label>
                <label class="form-check-label">
                    <input class="form-check-input" value="theatre" name="hobbies[]" type="checkbox" <?php
                    if($hobbiesCookie != null) :
                        foreach($hobbiesCookie as $passion) :
                            ?><?php if($passion == "theatre"): ?> checked
                        <?php endif; ?><?php endforeach; endif; ?>>Théâtre
                </label>
                <label class="form-check-label">
                    <input class="form-check-input" value="concert" name="hobbies[]" type="checkbox" <?php
                    if($hobbiesCookie != null) :
                        foreach($hobbiesCookie as $passion) :
                            ?><?php if($passion == "concert"): ?> checked
                        <?php endif; ?><?php endforeach; endif; ?>>Concert
                </label>
                <label class="form-check-label">
                    <input class="form-check-input" value="voyage" name="hobbies[]" type="checkbox" <?php
                    if($hobbiesCookie != null) :
                        foreach($hobbiesCookie as $passion) :
                            ?><?php if($passion == "voyage"): ?> checked
                        <?php endif; ?><?php endforeach; endif; ?>>Voyage
                </label>
                <br/>
                <input type="submit" value="Valider"/>
            </form>
        </div>
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