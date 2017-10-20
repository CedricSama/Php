<?php require_once 'partials/header.php' ?>
    <div class="container">
        <div class="row" style="width: 80%; margin:auto">
            <div class="col-xs-12 col-md-offset-2 col-md-8" >
                <h1>Inscription</h1>
                <div class="well">
                    <form action="?action=user/store" method="post">
                        <div class="form-group">
                            <label for="login">Login</label>
                            <input type="text" name="login" id="login" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="firstname">Prénom</label>
                            <input type="text" name="firstname" id="firstname" class="form-control">
                        </div>
                        <input type="submit" class="btn btn-primary pull-right" value="Ajouter">
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php require_once 'partials/footer.php' ?>