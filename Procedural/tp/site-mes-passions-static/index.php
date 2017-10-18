<?php
$error = isset($_GET['error'])? $_GET['error']: null;
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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
<!--<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>-->
    <!--[endif]-->
    <style>
        .error{
            background: #ea4235;
            padding: 10px;
            color: white;
            text-align: center;
            border-radius: 3px;
            box-shadow: #575757 1px 1px 3px;
        }
        .success{
            background: #51be3e;
            padding: 10px;
            color: white;
            text-align: center;
            border-radius: 3px;
            box-shadow: #575757 1px 1px 3px;
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
        </div>
    </div>
</div>
<div class="container" style="margin-top: 70px">
    <?php if($error == 1): ?>
        <div class="error">
            <p>Attention, le champ email est obligatoire !</p>
        </div>
    <?php endif; ?>
    <?php if($error == 2): ?>
        <div class="error">
            <p>Attention, le mots de passe est invalide !</p>
        </div>
    <?php endif; ?>
    <?php if($error == 3): ?>
        <div class="success">
            <p>Vous avez été déconnecté !</p>
        </div>
    <?php endif; ?>
    <?php if($error == 7): ?>
        <div class="error">
            <p>Connectez vous...</p>
        </div>
    <?php endif; ?>

    <?php if($error == 4): ?>
        <div class="error">
            <p>Connectez vous...</p>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="span9">
            <div class="page-header">
                <h1>Bienvenue !</h1>
                <h2>Merci de vous identifier...</h2>
            </div>
            <form class="well form-inline" method="post" action="controller.php">
                <input type="text" class="input-small" placeholder="Email" name="email">
                <input type="password" class="input-small" placeholder="Password" name="password">
                <button type="submit" class="btn">Valider</button>
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