<?php
require_once('../Controller/session_check.php');
require_once('../Model/User.php');
require_once('../Model/db.php');
$total_user = findAllUser(true);
$users = findAllUser();
$prenom =isset($_SESSION['prenom']) ? $_SESSION['prenom'] : null ;
require_once('../views/partial/header_admin.php');
?>
<body>
<div class="countainer">
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-striped table-botdred">
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
                        <td><img src="<?= $user['avatar_path'] ?>" alt="avate de <?= $user['prenom'] ?>"></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['prenom'] ?></td>
                        <td><?= $user['nom'] ?></td>
                        <td><?= $user['action'] ?></td>
                        <td><a href="../Controller/droit.php?id=<?= $user['id'] ?>"</a></td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>