<!-- Modify post -->

<?php require_once 'Views/head.php'; ?>

<form action="" method="post">

    <label for="prenom">Nom</label>
    <input type="text" name="nom" id="prenom"  value="<?= $user->getLastName()?>">

    <label for="prenom">Prénom</label>
    <input type="text" name="nom" id="nom"  value="<?= $user->getName()?>">

    <label for="email">E-mail</label>
    <input type="email" name="email" id="email"  value="<?= $user->getEmail()?>">

    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password"  value="<?= $user->getPassword()?>">

    
        <?php require_once 'Views/footer.php'; ?>

        