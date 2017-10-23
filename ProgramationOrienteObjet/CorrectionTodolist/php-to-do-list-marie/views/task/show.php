<?php require_once 'partials/header.php'?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h1><?= $task->getTitre() ?></h1>
            <h2>Date de création: <?= $task->getCreatedAt(true) ?></h2>
            <p><?= $task->getResume() ?></p>
            <p><?= $task->getContent() ?></p>
        </div>
    </div>
</div>
<?php require_once 'partials/footer.php'?>
