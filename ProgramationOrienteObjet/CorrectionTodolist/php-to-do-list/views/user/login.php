<?php require_once 'partials/header.php' ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 well">
            <?= $message ?>
            <form action="?action=user/executeLogin" method="post">
                <div class="form-group">
                    <label for="login">Votre Login</label>
                    <input type="text" name="login" class="form-control" id="login">
                </div>
                <div class="form-group">
                    <label for="password">Votre Password</label>
                    <input type="text" name="password" class="form-control" id="password">
                </div>
                <input type="submit" value="Valider" class="btn btn-success">
            </form>
        </div>
    </div>
</div>
<?php require_once 'partials/footer.php' ?>


