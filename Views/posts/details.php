<?php

use App\Models\Commentaire;

require_once 'Views/headId.php'; ?>

<?php var_dump($commentaires); ?>


<div class="d-flex flex-row justify-content-between">
    <div class="d-flex flex-column align-items-center card" style="width: 20%; height: max-content;">
        <div class="d-flex flex-row justify-content-around align-items-center">
            <div class="w-25">
                <img src="../../image/Profil_img.jpg" alt="photo de profil" style="width: 100%;">
            </div>
            <div>
                <h3><?= $_SESSION['user']->nom_utilisateur . " " . $_SESSION['user']->prenom_utilisateur ?></h3>
            </div>
        </div>
        <div><?= $_SESSION['user']->bio_utilisateur ?></div>
        <div class="p-5">
            <img src="../../image/sapin-bonmarche.png" alt="logo bonnefete" style="width: 100%;">
        </div>
    </div>

    <div class="card mb-4" style="width: 32rem;">
        <div class="card-body">
            <h5 class="card-title"><?= $post->nom_utilisateur . " " . $post->prenom_utilisateur ?></h5>
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
        <?php } elseif ($_SESSION['user']->is_moderateur) { ?>
            <div class="card-body">
                <a href="./delete/<?= $post->getIdPost() ?>" class="text-danger text-decoration-none">Supprimer</a>
            </div>
        <?php } ?>

        <!-- Système de like -->
        <div class="card-body">
            <div>
                <a href="#" class="text-primary text-decoration-none">J'aime</a>
                <span>5</span>
            </div>
        </div>

        <!-- Formulaire d'ajout de commentaire -->
        <div class="card-body">
            <form action="../commentaire/create" method="post">
                <div class="mb-3">
                    <textarea class="form-control" rows="1" placeholder="Ajouter un commentaire" minlength="1" maxlength="200" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Envoyer</button>
            </form>
        </div>

        <!-- Section des commentaires -->
        <div class="card-body">
            <h6>Commentaires :</h6>
            <?php foreach ($commentaires as $commentaire) : ?>
                <div class="d-flex flex-row justify-content-between mb-2">
                    <div>
                        <strong><?= $commentaire->nom_utilisateur . " " . $commentaire->prenom_utilisateur ?></strong>
                        <span class="text-secondary"><?= $commentaire->getDateCommentaire(); ?></span>
                    </div>
                    <div>
                        <div>
                            <a href="#" class="text-primary text-decoration-none">J'aime</a>
                            <span>5</span>
                        </div>
                    </div>
                </div>
                <div><?= $commentaire->getContenuCommentaire(); ?></div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="w-25"></div>
</div>



<?php require_once 'Views/footId.php'; ?>