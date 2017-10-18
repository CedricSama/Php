<?php
require_once 'Controller/functions.php';
$message = getFlash();
$data_form = (isset($_SESSION['data_form']))? $_SESSION['data_form'] : null;
$register = isset($_SESSION['register']) && $_SESSION['register']? true : false;
unset($_SESSION['register']);
require_once('views/partial/header_admin.php');
?>
<body>
<div class="container">
    <div class="row mb-5 justify-content-center">
        <h1>Mes Passions.com</h1>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <?= $message ?>
            <?php if(!$register) : ?>
                <h2 class="text-center">
                    Merci de vous inscrire
                </h2>
                <div class="col-lg-6">
                    <form action="Controller/register.php"
                          method="post"
                          enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" id="nom" placeholder="Nom" name="nom"
                                   value="<?= $data_form['nom'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text" class="form-control" id="prenom" placeholder="Prénom" name="prenom"
                                   value="<?= $data_form['prenom'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="text" class="form-control" id="email" aria-describedby="emailHelp"
                                   placeholder="Enter email" name="email" value="<?= $data_form['email'] ?>">
                            <small id="emailHelp" class="form-text text-muted">We' ll never share your email.
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="login">Votre login</label>
                            <input type="text" class="form-control" id="login" placeholder="Login" name="login"
                                   value="<?= $data_form['login'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1"
                                   placeholder="Password"
                                   name="password">
                        </div>
                        <div class="form-group">
                            <label for="avatar">Votre avatar</label>
                            <input type="file" name="avatar" id="avatar" class="form-control" style="border: 0">
                        </div>
                        <button type="submit"
                                class="btn btn-primary">
                            Valider
                        </button>
                    </form>
                </div>
            <?php else: ?>
                <h1>A Bientôt !</h1>
                <a href="index.php">
                    <button>Ajouter un nouvel utilisateur</button>
                </a>
            <?php endif ?>
        </div>
    </div>
</div>
<?php require_once('views/partial/footer_admin.php') ?>
</body>
</html>