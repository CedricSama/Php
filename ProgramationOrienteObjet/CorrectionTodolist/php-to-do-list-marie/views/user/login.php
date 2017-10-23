<?php require_once 'partials/header.php'?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 well">
                <?= $messages ?>
                <form action="index.php?action=user/executeLogin" method="POST">
                    <div class="form-group">
                        <label for="login">Votre login</label>
                        <input type="text" name="login" id="login" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Votre password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <input type="submit" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>

<?php require_once 'partials/footer.php'?>