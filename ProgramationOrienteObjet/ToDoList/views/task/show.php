<?php require_once 'partials/header.php' ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-offset-2 col-md-8 text-center">
            <h1>Titre de la Tâche : <?= $task -> getTitre() ?></h1>
            <h2>Date de création : <?= $task -> getCreatedAt(true) ?></h2>
            <p><?= $task -> getResume() ?></p>
            <p><?= $task -> getContent() ?></p>
        </div>
    </div>
</div>
<?php require_once 'partials/footer.php' ?>