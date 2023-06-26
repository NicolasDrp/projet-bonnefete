<?php require_once 'Views/head.php'; ?>

<a href="../post/create">Ecrire un post</a>

<table class="table">
    <tr>
        <th>Utilisateur</th>
        <th>Contenu</th>
        <th>Date</th>
    </tr>
    <?php foreach ($posts as $post) : ?>
        <tr>
            <td><?= $post->getIdUtilisateur() ?></td>
            <td><?= $post->getContenuPost() ?></td>
            <td><?= $post->getDatePost() ?></td>
            <td>
                <a href="./update/<?= $post->getIdPost() ?>">Modifier</a>
                <a href="./delete/<?= $post->getIdPost() ?>">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php require_once 'Views/foot.php'; ?>