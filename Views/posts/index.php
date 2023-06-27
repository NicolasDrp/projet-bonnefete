<?php require_once 'Views/head.php'; ?>

<a href="./index">Retour</a>

<div class="d-flex flex-row justify-content-between">
    <div class="d-flex flex-column align-items-center card" style="width: 20%; height: max-content;" >
        <div class="d-flex flex-row justify-content-around align-items-center">
            <div class="w-25">
                <img src="../image/Profil_img.jpg" alt="photo de profil" style="width: 100%;">
            </div>
            <div>
                <h3><?= $_SESSION['user']->nom_utilisateur . " " . $_SESSION['user']->prenom_utilisateur ?></h3>
            </div>
        </div>
        <div><?= $_SESSION['user']->bio_utilisateur ?></div>
        <div class="p-5">
            <img src="../image/sapin-bonmarche.png" alt="logo bonnefete" style="width: 100%;">
        </div>:
    </div>
    <div class="d-flex flex-column align-items-center">
        <form action="../post/create" method="post" style="width: 32rem;">
            <div class="form-group mb-3">
                <label for="contenu_post" class="form-label">Contenu de votre post</label>
                <textarea class="form-control" name="contenu_post" id="contenu_post" rows="3" maxlength="200"></textarea>
            </div>
            <button class="btn btn-success btn-sm mb-3">Envoyer</button>
        </form>


        <?php foreach ($posts as $post) : ?>
            <div class="card mb-4" style="width: 32rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $post->prenom_utilisateur . " " . $post->nom_utilisateur ?></h5>
                    <p class="card-text"><?= $post->getContenuPost() ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-secondary"><?= $post->getDatePost() ?></li>
                </ul>
                <?php if ($post->getIdUtilisateur() == $_SESSION['user']->id_utilisateur) { ?>
                    <div class="card-body">
                        <a href="./update/<?= $post->getIdPost() ?>" class="text-primary text-decoration-none me-3">Modifier</a>
                        <a href="./delete/<?= $post->getIdPost() ?>" class="text-danger text-decoration-none">Supprimer</a>
                    </div>

                <?php } ?>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="w-25"></div>
</div>



<?php require_once 'Views/foot.php'; ?>