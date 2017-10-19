<?php require_once 'partials/header.php' ?>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-offset-2 col-md-8">
                <h1>Ajouter une nouvelle tâche</h1>
                <div class="well">
                    <form action="?action=task/store" method="post">
                        <div class="form-group">
                            <label for="titre">Nom de la tâche</label>
                            <input type="text" name="titre" id="titre" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="resume">Résumé</label>
                            <input type="text" name="resume" id="resume" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="content">Contenu</label>
                            <textarea name="content" id="content" class="form-control" rows="5"></textarea>
                        </div>
                        <input type="submit" class="btn btn-primary pull-right" value="Ajouter">
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php require_once 'partials/footer.php' ?>