<?php require_once 'Views/head.php'; ?>

<?php if (empty($_SESSION)) :
    header('Location: ../../utilisateur/login');
endif; ?>


<?php
// foreach ($nomsJaime as $nomJaime) :
//     var_dump($nomJaime);
// endforeach;

var_dump($_SESSION['utilisateur']->id_utilisateur);
var_dump($estAime->estAime);
?>


<div class="d-flex flex-row justify-content-between">
    <div class="d-flex flex-column align-items-center card" style="width: 20%; height: max-content;">
        <div class="d-flex flex-row justify-content-around align-items-center">
            <div class="w-25">
                <img src="../../image/Profil_img.jpg" alt="photo de profil" style="width: 100%;">
            </div>
            <div>
                <h3><?= $_SESSION['utilisateur']->nom_utilisateur . " " . $_SESSION['utilisateur']->prenom_utilisateur ?></h3>
            </div>
        </div>
        <div><?= $_SESSION['utilisateur']->bio_utilisateur ?></div>
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
        <?php if ($post->getIdUtilisateur() == $_SESSION['utilisateur']->id_utilisateur) { ?>
            <div class="card-body">
                <a href="../update/<?= $post->getIdPost() ?>" class="text-primary text-decoration-none me-3">Modifier</a>
                <a href="../delete/<?= $post->getIdPost() ?>" class="text-danger text-decoration-none">Supprimer</a>
            </div>
        <?php } elseif ($_SESSION['utilisateur']->is_moderateur) { ?>
            <div class="card-body">
                <a href="../delete/<?= $post->getIdPost() ?>" class="text-danger text-decoration-none">Supprimer</a>
            </div>
        <?php } ?>

        <!-- Système de j'aime -->
        <div class="card-body">
            <div>
                <a href="#" class="text-primary text-decoration-none">J'aime</a>
                <span><?= $nbrJaime->nbrJaime ?></span>
            </div>
            <div>
                <?php if ($estAime->estAime) { ?>
                    <a href="../../jaime/retirerJaime/<?= $post->getIdPost() ?>"><i class="fa-solid fa-heart fa-beat" style="color: #fa0000;"></i></a>
                <?php } else { ?>
                    <a href="../../jaime/ajouterJaime/<?= $post->getIdPost() ?>"><i class="fa-regular fa-heart fa-lg"></i></a>
                <?php } ?>
            </div>
        </div>

        <!-- Formulaire d'ajout de commentaire -->
        <?php if (!$_SESSION['utilisateur']->is_moderateur) { ?>
            <div class="card-body">
                <form action="../../commentaire/create/<?= $post->getIdPost() ?>" method="post">
                    <div class="mb-1">
                        <textarea class="form-control" name="contenu_commentaire" id="contenu_commentaire" rows="1" placeholder="Ajouter un commentaire" minlength="1" maxlength="200" required></textarea>
                    </div>
                    <button class="btn btn-primary btn-sm">Envoyer</button>
                </form>
            </div>
        <?php } ?>

        <!-- Section des commentaires -->
        <div class="card-body">
            <h6 class="fs-4">Commentaires :</h6>
            <?php foreach ($commentaires as $commentaire) : ?>
                <div class="d-flex flex-row justify-content-between">
                    <div>
                        <strong class="fs-5"><?= $commentaire->nom_utilisateur . " " . $commentaire->prenom_utilisateur ?></strong>
                        <span class="text-secondary"><?= $commentaire->getDateCommentaire(); ?></span>
                    </div>
                    <div>
                        <div>
                            <a href="../../commentaire/modifier/<?= $commentaire->getIdCommentaire() ?>" class="text-primary text-decoration-none me-3">Modifier</a>
                            <a href="../../commentaire/delete/<?= $commentaire->getIdCommentaire() ?>/<?= $post->getIdPost() ?>" class="text-danger text-decoration-none">Supprimer</a>
                            <br>
                            <a href="#" class="text-primary text-decoration-none ">J'aime</a>
                            <span>5</span>
                        </div>
                    </div>
                </div>
                <div><?= $commentaire->getContenuCommentaire(); ?></div>
                <!-- Affichage des sous commentaires -->
                <?php foreach ($sousCommentaires as $sousCommentaire) :
                    if ($sousCommentaire->getIdCom() == $commentaire->getIdCommentaire()) { ?>
                        <div class="d-flex flex-column justify-content-between ps-5">
                            <div class="d-flex flex-row justify-content-between">
                                <div>
                                    <strong><?= $sousCommentaire->nom_utilisateur . " " . $sousCommentaire->prenom_utilisateur ?></strong>
                                    <span class="text-secondary fs-6"><?= $sousCommentaire->getDateCommentaire(); ?></span>
                                </div>
                                <div>
                                    <div>
                                        <a href="../../commentaire/delete/<?= $sousCommentaire->getIdCommentaire() ?>/<?= $post->getIdPost() ?>" class="text-light text-decoration-none btn btn-sm btn-danger">Supprimer</a>
                                        <a href="#" class="text-primary text-decoration-none fs-6 ">J'aime</a>
                                        <span>5</span>
                                    </div>
                                </div>
                            </div>
                            <?= $sousCommentaire->getContenuCommentaire(); ?>
                        </div>
                    <?php } ?>
                <?php endforeach; ?>
                <!-- Formulaire d'ajout de sous-commentaire -->
                <?php if (!$_SESSION['utilisateur']->is_moderateur) { ?>
                    <div class="card-body">
                        <form action="../../commentaire/createSous/<?= $post->getIdPost() ?>/<?= $commentaire->getIdCommentaire() ?>" method="post">
                            <div class="mb-1">
                                <textarea class="form-control" name="contenu_commentaire" id="contenu_commentaire" rows="1" placeholder="Ajouter un commentaire" minlength="1" maxlength="200" required></textarea>
                            </div>
                            <button class="btn btn-primary btn-sm">Envoyer</button>
                        </form>
                    </div>
                    <hr class="mt-0 mb-2">
                <?php } ?>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="w-25"></div>
</div>



<?php require_once 'Views/foot.php'; ?>