<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <title>BONNEFETE</title>
</head>
<body style="background-color: #F3F2F0;">
    
<?php if(empty($_SESSION)) : ?>
    <a href="../user/login">Se connecter</a>
    <?php else: ?>
        <a href="../user/logout">Se deconnecter</a>
        <?php endif; ?>