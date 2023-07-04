<?php require_once 'Views/head.php'; ?>


<div class="d-flex flex-column align-items-center">
    <form action="<?php "../../utilisateur/maj/ . $id_utilisateur" ?>" method="post">

        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" class="form-control" value="<?= $utilisateur->getPrenomUtilisateur() ?>">


        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom" class="form-control" value="<?= $utilisateur->getNomUtilisateur() ?>">

        <label for="bio">Bio</label>
        <input type="text" name="bio" id="bio" class="form-control" value="<?= $utilisateur->getBioUtilisateur() ?>">

        <label for="email">Adresse e-mail</label>
        <input type="email" name="email" id="email" class="form-control" value="<?= $utilisateur->getEmailUtilisateur() ?>">

        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" class="form-control" value="<?= $utilisateur->getPasswordUtilisateur() ?>">

        <button class="btn btn-primary">Mettre à jour</button>
    </form>
</div>

<?php require_once 'Views/foot.php'; ?>