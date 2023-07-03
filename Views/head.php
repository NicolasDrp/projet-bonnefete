<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/projet-bonnefete/vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <title>BONNEFETE</title>
</head>

<body style="background-color: #F3F2F0;">
    <nav class="navbar bg-success mb-5">
        <div class="container-fluid">
            <?php if (empty($_SESSION)) : ?>
                <a href="../utilisateur/connexion" class="navbar-brand fs-3 fw-semibold text-light">BONNEFETE</a>
                <div>
                    <a href="../utilisateur/enregistrer" class="btn btn-light">Creer un compte</a>
                    <a href="../utilisateur/connexion" class="btn btn-dark">Se Connecter</a>
                </div>
            <?php else : ?>
                <a href="../../../projet-bonnefete/post/index" class="navbar-brand fs-3 fw-semibold text-light">BONNEFETE</a>
                <?php if ($_SESSION['utilisateur']->est_moderateur || $_SESSION['utilisateur']->est_super_admin) { ?>
                    <a href="../../../projet-bonnefete/utilisateur/utilisateurs" class="btn btn-light">Liste des utilisateurs</a>
                <?php  } ?>
                <div>
                    <a href="../../../projet-bonnefete/utilisateur/logout" class="btn btn-dark">Se deconnecter</a>
                </div>
            <?php endif; ?>
        </div>
    </nav>