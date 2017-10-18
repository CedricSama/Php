<?php
require_once('../Controller/session_check.php');
require_once('../Model/User.php');
require_once('../Model/db.php');
require_once('../Controller/functions.php');
$total_user = findAllUser(true);
$users = findAllUser();
$prenom = isset($_SESSION['prenom'])? $_SESSION['prenom'] : null;
require_once('../views/partial/header_admin.php');
$message = getFlash();
?>
<body>
<div class="countainer">
    <div class="row mt-3">
        <div class="col-xs-10 m-auto align-items-center">
            <?= $message ?>
        </div>
    </div>
    <h1 class="text-center m-1">Liste des Membres</h1>
    <div class="row">
        <div class="col-xs-12 ml-5 mt-2">
            <table class="table table-responsive
            table-striped table-bordered">
                <caption>Liste Membres</caption>
                <thead>
                <tr>
                    <th>Avatar</th>
                    <th>Emial</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php while($user = mysqli_fetch_assoc($users)) : ?>
                    <tr>
                        <td>
                            <img src="<?= $user['avatar_path'] ?>"
                                 alt="avate de <?= $user['prenom'] ?>">
                        </td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['prenom'] ?></td>
                        <td><?= $user['nom'] ?></td>
                        <?php if($user['is_admin']) : ?>
                            <td>
                                <a class="btn btn-xs btn-danger" href="../Controller/droit.php?is_admin=0&id=<?= $user['id'] ?>">Retirer droit admin</a>
                            </td>
                        <?php else: ?>
                            <td>
                                <a class="btn btn-xs btn-outline-primary" href="../Controller/droit.php?is_admin=1&id=<?= $user['id'] ?>">Donner droit admin</a>
                            </td>
                        <?php endif; ?>

                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>