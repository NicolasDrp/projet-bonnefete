<?php require_once 'Views/head.php'; ?>



<form action=<?= !$user ? "../user/create" : "../../user/update/" .$id ?> method="post">
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" class="form-group" value="<?= $user ? $user->getName(): "" ?>">
     </div>
    <button class="btn btn-primary"><?= $user ? "Mettre à jour" : "Ajouter" ?></button>
</form>


<?php require_once 'Views/foot.php'; ?>