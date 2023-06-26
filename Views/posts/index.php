<?php require_once 'Views/head.php'; ?>

<a href="../post/create">Ecrire un post</a>

<?php foreach ($posts as $post) : ?>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?= $post->getIdUtilisateur() ?></h5>
            <p class="card-text"><?= $post->getContenuPost() ?></p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><?= $post->getDatePost() ?></li>
        </ul>
        <div class="card-body">
            <a href="./update/<?= $post->getIdPost() ?>">Modifier</a>
            <a href="./delete/<?= $post->getIdPost() ?>">Supprimer</a>
        </div>
    </div>

<?php endforeach; ?>

<?php require_once 'Views/foot.php'; ?>