<?php require_once 'Views/head.php'; ?>

<?php var_dump($_SESSION['utilisateur']) ?>

<div class="d-flex flex-row mb-3 mb-lg-5 mb align-items-center">
    <div style="width: 10%;" class="me-5">
        <img src="../../image/Profil_img.jpg" alt="photo de profil" style="width: 100%;border-radius: 15px;">
    </div>
    <div class="me-2"><?php if ($utilisateur->getIdUtilisateur() == $_SESSION['utilisateur']->id_utilisateur) { ?>
            <a href="../../utilisateur/maj/<?= $utilisateur->getIdUtilisateur() ?>" class="btn btn-secondary btn" style="height: min-content;">Modifier Mon Compte</a>
        <?php } elseif ($_SESSION['utilisateur']->est_super_admin && !$utilisateur->isEstSuperAdmin()) { ?>
            <a href="../../utilisateur/supprimer/<?= $utilisateur->getIdUtilisateur() ?>" class="btn btn-secondary btn" style="height: min-content;">Supprimer l'utilisateur</a>
        <?php  } elseif (($_SESSION['utilisateur']->est_moderateur || $_SESSION['utilisateur']->est_super_admin) && !$utilisateur->isEstSuperAdmin() && !$utilisateur->isEstModerateur()) { ?>
            <a href="../../utilisateur/supprimer/<?= $utilisateur->getIdUtilisateur() ?>" class="btn btn-secondary btn" style="height: min-content;">Supprimer l'utilisateur</a>
        <?php  } ?>
    </div>
    <div> <?php
            if ($_SESSION['utilisateur']->est_super_admin && !$utilisateur->isEstModerateur()) { ?>
            <a href="../../utilisateur/changerModerateur/<?= $utilisateur->getIdUtilisateur() ?>" class="btn btn-secondary btn" style="height: min-content;">Passer Moderateur</a>
        <?php } elseif ($_SESSION['utilisateur']->est_super_admin && $utilisateur->isEstModerateur()) { ?>
            <a href="../../utilisateur/changerModerateur/<?= $utilisateur->getIdUtilisateur() ?>" class="btn btn-secondary btn" style="height: min-content;">Retirer Moderateur</a>
        <?php } ?>
    </div>
</div>
<div class="d-block d-xl-none mb-3">
    <h3><?= $utilisateur->getNomUtilisateur() . " " . $utilisateur->getPrenomUtilisateur() ?></h3>
    <div class="w-100 p-1"><?= $utilisateur->getBioUtilisateur() ?></div>
</div>


<div class="d-flex flex-row justify-content-between">
    <div class="d-flex flex-column align-items-center card d-none d-sm-block" style="width: 20%; height: max-content;">
        <div class="d-flex flex-row justify-content-around align-items-center">
            <div>
                <h3><?= $utilisateur->getNomUtilisateur() . " " . $utilisateur->getPrenomUtilisateur() ?></h3>
            </div>
        </div>
        <div class="w-100 p-2"><?= $utilisateur->getBioUtilisateur() ?></div>
        <div class="p-5">
            <img src="../../image/sapin-bonmarche.png" alt="logo bonnefete" style="width: 100%;">
        </div>
    </div>

    <div class="d-flex flex-column align-items-center m-auto m-xl-0" style="width: 40rem;">
        <?php foreach ($posts as $post) : ?>
            <div class="card mb-4 w-100">
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
                <?php } elseif ($_SESSION['utilisateur']->est_moderateur || $_SESSION['utilisateur']->est_super_admin) { ?>
                    <div class="card-body">
                        <a href="./supprimer/<?= $post->getIdPost() ?>" class="text-danger text-decoration-none">Supprimer</a>
                    </div>
                <?php } ?>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="w-25 d-none d-xl-block"></div>
</div>




<?php require_once 'Views/foot.php'; ?>