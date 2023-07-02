<?php require_once 'Views/head.php'; ?>


<div style="width: 10%;" class="mb-5">
    <img src="../../image/Profil_img.jpg" alt="photo de profil" style="width: 100%;border-radius: 15px;">
</div>

<div class="d-flex flex-row justify-content-between">
    <div class="d-flex flex-column align-items-center card" style="width: 20%; height: max-content;">
        <div class="d-flex flex-row justify-content-around align-items-center">
            <div>
                <h3><?= $utilisateur->getNomUtilisateur() . " " . $utilisateur->getPrenomUtilisateur() ?></h3>
            </div>
        </div>
        <div><?= $utilisateur->getBioUtilisateur() ?></div>
        <div class="p-5">
            <img src="../../image/sapin-bonmarche.png" alt="logo bonnefete" style="width: 100%;">
        </div>
    </div>

    <div class="d-flex flex-column align-items-center">
        <?php foreach ($posts as $post) : ?>
            <div class="card mb-4" style="width: 40rem;">
                <a href="../../post/details/<?= $post->getIdPost() ?>" class="text-decoration-none text-dark">
                    <div class="card-body">
                        <h5 class="card-title"><?= $utilisateur->getNomUtilisateur() . " " . $utilisateur->getPrenomUtilisateur() ?></h5>
                        <p class="card-text"><?= $post->getContenuPost() ?></p>
                    </div>
                </a>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-secondary"><?= $post->getDatePost() ?></li>
                </ul>
                <?php if ($post->getIdUtilisateur() == $_SESSION['utilisateur']->id_utilisateur) { ?>
                    <div class="card-body">
                        <a href="../../post/maj/<?= $post->getIdPost() ?>" class="text-primary text-decoration-none me-3">Modifier</a>
                        <a href="../../post/supprimer/<?= $post->getIdPost() ?>" class="text-danger text-decoration-none">Supprimer</a>
                    </div>
                <?php } elseif ($_SESSION['utilisateur']->est_moderateur) { ?>
                    <div class="card-body">
                        <a href="./supprimer/<?= $post->getIdPost() ?>" class="text-danger text-decoration-none">Supprimer</a>
                    </div>
                <?php } ?>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="w-25"></div>
</div>




<?php require_once 'Views/foot.php'; ?>