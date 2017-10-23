<?php require_once 'partials/header.php' ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 well">
            <?= $messages ?>
            <form action="?action=user/store" method="post">
                <div class="form-group">
                    <label for="login">Votre Login</label>
                    <input type="text" name="login" class="form-control" id="login">
                </div>
                <div class="form-group">
                    <label for="password">Votre Password</label>
                    <input type="text" name="password" class="form-control" id="password">
                </div>
                <div class="form-group">
                    <label for="email">Votre email</label>
                    <input type="text" name="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="nom">Votre Nom</label>
                    <input type="text" name="nom" class="form-control" id="nom">
                </div>
                <div class="form-group">
                    <label for="prenom">Votre Prenom</label>
                    <input type="text" name="prenom" class="form-control" id="prenom">
                </div>
                <input type="submit" value="Valider" class="btn btn-success">
            </form>
        </div>
    </div>
</div>
<?php require_once 'partials/footer.php' ?>


