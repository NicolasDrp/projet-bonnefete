<?php var_dump($_SESSION) ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/projet-bonnefete/vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <title>BONNEFETE</title>
</head>
<body>
<?php if(empty($_SESSION)) : ?>
<a href="../user/login">Se Connecter</a>
<?php else: ?>
<a href="../user/logout">Se Deconnecter</a>
<?php endif; ?>