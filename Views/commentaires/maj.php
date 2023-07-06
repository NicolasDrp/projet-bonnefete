<?php require_once 'Views/head.php'; ?>

<?php
if (!($_SESSION['utilisateur']->id_utilisateur == $commentaire->getIdUtilisateur())) {
    echo "Vous essayez de modifier un commentaire qui n'est pas le votre";
} else { ?>
    <form action=<?= "../../commentaire/modifier/" . $id_commentaire ?> method="post">
        <div class="form-group">
            <label for="contenu_commentaire">Contenu de votre commentaire</label>
            <textarea class="form-control" name="contenu_commentaire" id="contenu_commentaire" rows="1" minlength="1" maxlength="200" required><?= $commentaire->getContenuCommentaire() ?></textarea>
            <input type="hidden" name="id_post" value="<?= $commentaire->getIdPost() ?>">
        </div>
        <button class="btn btn-primary">Modifier</button>
    </form>
<?php } ?>

<?php require_once 'Views/foot.php'; ?>