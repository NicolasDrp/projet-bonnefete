<?php require_once 'Views/head.php'; ?>

<a href=<?= !$post ? "./index" : "./../index"?>>Retour</a>

<form action=<?= !$post ? "../post/create" : "../../post/update/".$id ?> method="post">
    <div class="form-group">
        <label for="contenu_post">Nom du livre</label>
        <input type="text" name="contenu_post" id="contenu_post" class="form-control" value="<?= $post ? $post->getIdPost() : "" ?>">
    </div>
    <button class="btn btn-primary"><?= $post ? "Mettre à jour" : "Ajouter"?></button>
</form>

<?php require_once 'Views/foot.php'; ?>