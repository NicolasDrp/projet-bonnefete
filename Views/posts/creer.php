<?php require_once 'Views/head.php'; ?>

<?php
if (!($_SESSION['utilisateur']->id_utilisateur == $post->getIdUtilisateur())) {
    echo "Vous essayez de modifier un post qui n'est pas le votre";
} else { ?>
    <form action=<?= "../../post/maj/" . $id ?> method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="contenu_post">Contenu de votre post</label>
            <textarea class="form-control" name="contenu_post" id="contenu_post" rows="1" minlength="1" maxlength="200" required><?= $post->getContenuPost() ?></textarea>
            <div class="d-grid gap-2 col-6 mx-auto mt-5">
                <input type="file" class="form-control" name="image">
            </div>
        </div>
        <button class="btn btn-primary">Mettre à jour</button>
    </form>
<?php }
?>



<?php require_once 'Views/foot.php'; ?>