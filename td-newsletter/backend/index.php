<?php
require_once ('../Controller/functions.php');
$messages = getFlash();?>
<!doctype html>
<html lang="fr">
<?php
require_once ('../views/partial/header_admin.php');
?>
<body>
<div class="container">
    <div class="row mb-5 justify-content-center"><h1>Mes Passions.com</h1></div>
    <?= $messages ?>
    <form action="../Controller/login.php" method="post">
        <div class="form-groupe">
            <label for="login">Votre Login</label>
            <input type="text" id="login" class="form-control" name="login">
        </div>
        <div class="form-groupe">
            <label for="password">Votre Password</label>
            <input type="text" id="password" class="form-control" name="password">
        </div>
        <input type="submit" class="btn btn-success mt-3">
    </form>
</div>
<?php require_once ('../views/partial/footer_admin.php') ?>
</body>
</html>