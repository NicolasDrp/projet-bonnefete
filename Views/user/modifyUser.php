<?php require_once 'Views/head.php'; ?>


<form action=<?= !$user ? "../user/create" : "../../user/update/" .$id_utilisateur ?> method="post">
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" class="form-group" value="<?= $user ? $user->getName(): "" ?>">


        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom" class="form-group" value="<?= $user ? $user->getLastName(): "" ?>">

        <label for="bio">Bio</label>
        <input type="text" name="bio" id="bio" class="form-control" value="<?= $user ? $user->getBio() : "" ?>">

        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" class="form-group" value="<?= $user ? $user->getEmail(): "" ?>">

        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" class="form-group" value="<?= $user ? $user->getPassword(): "" ?>">
    </div>
    <button class="btn btn-primary"><?= $user ? "Mettre à jour" : "Ajouter" ?></button>
</form>


<?php require_once 'Views/foot.php'; ?>