<?php require_once 'Views/head.php'; ?>


<div class="d-flex flex-column align-items-center">
    <form action=<?= !$utilisateur ? "../utilisateur/create" : "../../utilisateur/modify/" . $id_utilisateur ?> method="post">
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="form-group" value="<?= $utilisateur ? $utilisateur->getName() : "" ?>">


            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" class="form-group" value="<?= $utilisateur ? $utilisateur->getLastName() : "" ?>">

            <label for="bio">Bio</label>
            <input type="text" name="bio" id="bio" class="form-control" value="<?= $utilisateur ? $utilisateur->getBio() : "" ?>">

            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" class="form-group" value="<?= $utilisateur ? $utilisateur->getEmail() : "" ?>">

            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" class="form-group" value="<?= $utilisateur ? $utilisateur->getPassword() : "" ?>">
        </div>
        <button class="btn btn-primary"><?= $utilisateur ? "Mettre à jour" : "Ajouter" ?></button>
    </form>
</div>

<?php require_once 'Views/foot.php'; ?>