<?php require_once 'Views/head.php'; ?>

<div class="d-flex flex-row justify-content-between">
    <div class="d-flex flex-column align-items-center card" style="width: 20%; height: max-content;">
        <div class="d-flex flex-row justify-content-around align-items-center">
            <div class="w-25">
                <img src="../image/Profil_img.jpg" alt="photo de profil" style="width: 100%;">
            </div>
            <div>
                <h3><?= $_SESSION['utilisateur']->nom_utilisateur . " " . $_SESSION['utilisateur']->prenom_utilisateur ?></h3>
            </div>
        </div>
        <div><?= $_SESSION['utilisateur']->bio_utilisateur ?></div>
        <div class="p-5">
            <img src="../image/sapin-bonmarche.png" alt="logo bonnefete" style="width: 100%;">
        </div>
    </div>
    <div class="d-flex flex-column align-items-center">
        <?php if (!$_SESSION['utilisateur']->est_moderateur) { ?>
            <form action="../post/creer" method="post" style="width: 32rem;">
                <div class="form-group mb-3">
                    <label for="contenu_post" class="form-label">Contenu de votre post</label>
                    <textarea class="form-control" name="contenu_post" id="contenu_post" rows="3" maxlength="200"></textarea>
                </div>
                <button class="btn btn-success btn-sm mb-3">Envoyer</button>
            </form>
        <?php } ?>


        <?php foreach ($utilisateurs as $utilisateur) : ?>
            <div class="card mb-4" style="width: 32rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $utilisateur->nom_utilisateur . " " . $utilisateur->prenom_utilisateur ?></h5>
                    <p class="card-text"><?= $utilisateur->getContenuUtilisateur() ?></p>
                </div>

                <?php if ($utilisateur->getIdUtilisateur() === $_SESSION['utilisateur']->id_utilisateur) { ?>
                    <div class="card-body">
                        <a href="./maj/<?= $utilisateur->getIdUtilisateur() ?>" class="text-primary text-decoration-none me-3">Modifier</a>
                        <a href="./supprimer/<?= $utilisateur->getIdUtilisateur() ?>" class="text-danger text-decoration-none">Supprimer</a>
                    </div>
                <?php } elseif ($_SESSION['utilisateur']->est_moderateur) { ?>
                    <div class="card-body">
                        <a href="./supprimer/<?= $utilisateur->getIdUtilisateur() ?>" class="text-danger text-decoration-none">Supprimer</a>
                    </div>
                <?php } ?>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="w-25"></div>
</div>



<?php require_once 'Views/foot.php'; ?>