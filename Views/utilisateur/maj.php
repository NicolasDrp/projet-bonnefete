<?php require_once 'Views/head.php'; ?>


<div class="d-flex flex-column align-items-center">
    <form action=<?= !$utilisateur ? "../utilisateur/creer" : "../../utilisateur/maj/" . $id_utilisateur ?> method="post">
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="form-group" value="<?= $utilisateur ? $utilisateur->getPrenomUtilisateur() : "" ?>">


            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" class="form-group" value="<?= $utilisateur ? $utilisateur->getNomUtilisateur() : "" ?>">

            <label for="bio">Bio</label>
            <input type="text" name="bio" id="bio" class="form-control" value="<?= $utilisateur ? $utilisateur->getBioUtilisateur() : "" ?>">

            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" class="form-group" value="<?= $utilisateur ? $utilisateur->getEmailUtilisateur() : "" ?>">

            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" class="form-group" value="<?= $utilisateur ? $utilisateur->getPasswordUtilisateur() : "" ?>">
        </div>
        <button class="btn btn-primary"><?= $utilisateur ? "Mettre à jour" : "Ajouter" ?></button>
    </form>
</div>

<?php require_once 'Views/foot.php'; ?>