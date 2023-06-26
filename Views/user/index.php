<?php require_once 'Views/head.php'; ?>

<a href="../user/create">Nouveau post</a>

<table class="table">
    <tr>
        <th></th>
        <th></th>
        <th></th>
    </tr>

    <?php foreach ($users as $user) : ?>
        <tr>
            <td><?= $user->getId()?></td>
            <td><?= $user->getName()?></td>
            <td><?= $user->getLastName()?></td>

            <td>
                <a href="./add/<?= $user->getId()?>">Ajouter</a>
                <a href="./update/<?= $user->getId()?>">Modifier</a>
                <a href="./delete/<?= $user->getId()?>">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
</table>

<?php require_once 'Views/footer.php'; ?>
