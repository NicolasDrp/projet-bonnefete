<?php require_once 'Views/head.php'; ?>

<a href=<?= !$post ? "./index" : "./../index" ?>>Retour</a>

<form action=<?= !$post ? "../post/creer" : "../../post/maj/" . $id ?> method="post">
    <div class="form-group">
        <label for="contenu_post">Contenu de votre post</label>
        <textarea class="form-control" name="contenu_post" id="contenu_post" rows="1" minlength="1" maxlength="200" required><?= $post ? $post->getContenuPost() : "" ?></textarea>

    </div>
    <button class="btn btn-primary"><?= $post ? "Mettre à jour" : "Ajouter" ?></button>
</form>

<?php require_once 'Views/foot.php'; ?>