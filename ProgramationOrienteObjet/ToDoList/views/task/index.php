<?php require_once 'partials/header.php' ?>
    <div class="container">
    <h1>Hello, <?= $prenom ?>!</h1>
        <a class="btn btn-primary btn-xs" href="?action=Task/create" style="margin: 10px;padding:5px;text-align: center">Ajouter une tâche à votre ToDoList</a>
    <table class="table table-bordered">
    <thead>
    <tr>
        <th>Titre</th>
        <th>Résumé</th>
        <th>Date de Création</th>
        <th>Statut</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($tasks as $task) :?>
    <tr>
        <td><?= $task -> getTitre() ?></td>
        <td><?= $task -> getResume() ?></td>
        <td><?= $task -> getCreatedAt(true) ?></td>
        <td><?= $task -> getLibelle() ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
    </div>

<?php require_once 'partials/footer.php' ?>