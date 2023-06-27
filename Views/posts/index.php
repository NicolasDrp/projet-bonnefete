<?php require_once 'Views/head.php'; ?>

<a href="./index">Retour</a>

<div class="d-flex flex-column align-items-center">

    <form action="../post/create" method="post" style="width: 32rem;">
        <div class="form-group mb-3">
            <label for="contenu_post" class="form-label">Contenu de votre post</label>
            <textarea class="form-control" name="contenu_post" id="contenu_post" rows="3"></textarea>
        </div>
        <button class="btn btn-success btn-sm mb-3">Envoyer</button>
    </form>


    <?php foreach ($posts as $post) : ?>
        <div class="card mb-4" style="width: 32rem;">
            <div class="card-body">
                <h5 class="card-title"><?= $post->getIdUtilisateur() ?></h5>
                <p class="card-text"><?= $post->getContenuPost() ?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item text-secondary"><?= $post->getDatePost() ?></li>
            </ul>
            <div class="card-body">
                <a href="./update/<?= $post->getIdPost() ?>" class="text-primary text-decoration-none me-3">Modifier</a>
                <a href="./delete/<?= $post->getIdPost() ?>" class="text-danger text-decoration-none">Supprimer</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php require_once 'Views/foot.php'; ?>