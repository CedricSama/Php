<?php
require_once 'Partials/header.php';?>
<div class="container">
<div class="row">
    <div class="col-xs-12">
        <h1>Bienvenue à la ToDolist</h1>
        <h2>Voici toutes les tasks</h2>

     </div>
    <div class="row">
        <div class="col-xs-12"></div>

        <?php require_once                                                                                                                                                                                                                                                                                          'Partials/menu_task.php'?>

        <table id="todolist" class="table table-striped table-condensed table-responsive">
            <thead>
            <tr>
                <th>Titre</th>
                <th>Resume</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($tasks as $task):?>
            <tr>
                <td><?= $task->getTitre()?></td>
                <td><?= $task->getResume()?></td>
                <td><?= $task->libelle?></td>
                <td>
                    <a href="#" class="btn btn-xs btn-warning">Modifier</a>
                    <a href="#" class="btn btn-xs btn-danger">supprimer</a>

                </td>


            </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
    </div>
</div>
<?php require_once 'Partials/footer.php';?>
