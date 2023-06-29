<?php require_once 'Views/head.php'; ?>

<form action="../utilisateur/login" method="post"> 
    <label for="email">Email</label>
    <input type="email" name="email" id="email" required>

    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password" required>

        <button>
            Se connecter
        </button>
</form>

<?php require_once 'Views/foot.php'; ?>