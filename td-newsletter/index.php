<?php
require_once 'Controller/functions.php';
$message = getFlash();
$data_form = (isset($_SESSION['data_form']))? $_SESSION['data_form'] : null;
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
            integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
            integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
            crossorigin="anonymous"></script>
    <title>Tp</title>
</head>
<body>
<div class="container">
    <div class="row mb-5 justify-content-center"><h1>Mes Passions.com</h1></div>
    <div class="row">
        <div class="col-lg-8">
            <?= $message ?>
            <h2 class="text-center">Merci de vous inscrire</h2>
            <div class="col-lg-6">
                <form action="Controller/register.php" method="post">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" id="nom" placeholder="Nom"
                           name="nom" <?php
                    if($data_form != null) :
                        foreach($data_form as $data) : ?>
                            value=' <?= $data["nom"]?> '
                        <?php endforeach; endif; ?>
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" class="form-control" id="prenom" placeholder="Prénom" name="prenom">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="text" class="form-control" id="email" aria-describedby="emailHelp"
                           placeholder="Enter email" name="email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email.
                    </small>
                </div>
                <div class="form-group">
                    <label for="login">Votre login</label>
                    <input type="text" class="form-control" id="login" placeholder="Login" name="login">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
                           name="password">
                </div>
                <button type="submit" class="btn btn-primary">Valider</button>
            </form></div>
        </div>
    </div>
</div>
</body>
</html>