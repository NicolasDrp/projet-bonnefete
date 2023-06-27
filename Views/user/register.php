<?php require_once 'Views/head.php'; ?>

<form action="../user/register" method="post">
    <label for="nom">Nom</label>
    <input type="text" name="nom" id="nom" required>

    <label for="prenom">Prénom</label>
    <input type="text" name="prenom" required>

    <label for="email">E-mail</label>
    <input type="email" name="email" required>

    <label for="password">Mot de passe</label>
    <input type="password" name="password" required>

    <button> S'inscrire </button>

</form>
    
<?php require_once 'Views/foot.php'; ?>