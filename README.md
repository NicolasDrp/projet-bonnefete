
# Projet BONNEFETE

Ce projet porte sur la réalisation d'un site de type réseau social pour la société BONNEFETE.



## Objectifs :

- Permettre la connexion des utilisateurs.
- Publication de post de 200 caractères maximum (avec la possibilité de mettre une image).
- Permettre aux utilisateurs d'avoir une sessions avec leurs informations.
- Les utilisateurs peuvent modifier leurs informations (email, mot de passe, nom d'utilisateur).
- Les utilisateurs doivent aussi pouvoir voir ses posts, les modifier et/ou les supprimer.
- Les utilisateurs voient les posts des autres en lecture seule.
- Mise en place de 3 rôles : utilisateur, modérateur et super-administrateur.
- La page de connexion/inscription est la première à apparaître; tant que l'utilisateur n'est pas connecté il ne peut pas voir de post.
- Un utilisateur doit s'inscrire avant de se connecter, il ne peut pas choisir son rôle. 
- Un modérateur ne doit pouvoir modifier que le rôle de l'utilisateur, il ne peut pas modifier le rôle d'un super-administrateur.
- Un super-administrateur ne peut pas en supprimer un autre.

## Pages / fonctionnalités  :
- Page inscription.
- Page connexion du profil.
- Visualisation, modification et suppression du profil.
- Ajout, visualisation, modérateur et suppression d'un post.
- Visualisation de la liste des utilisateurs pour les modérateur et super-administrateur.
- Visualisation de la liste des posts d'un utilisateur.
- Le mot de passe de l'utilisateur sera stocker et encrypté avec un miimum de 8 caractères.
- Le nom de l'utilisateur sera stocker en majuscule.
- L'email définit à l'inscription doit être valide.
- Un post est écrit par un seul utilisateur, il ne peut pas contenir d'image et une date ainsi qu'une heure seront stocké.



## Relation entre le site et la base de données :

- Identifiant sécurisé.
- Sécurisation des données sensibles (Identifiant et URL de la base de données).
- Le mot de passe et l'identifiant de la base de données se situent dans le fichier .env.




## Installation

- Installer un IDE (éditeur de code) comme Visual Studio Code ou PHP Storm.
- Installer PHP 8.2.0, MAMP (MacOS) ou XAMPP (Windows/Linux) sur votre ordinateur ainsi que mySQLWorkBench.

- Cloner le dépît github sur votre ordinateur en ouvrant le terminal de commande et en utilisant cette commande :
```bash
  git clone https://github.com/NicolasDrp/projet-bonnefete
```

- Installer composer sur votre ordinateur via le termina de commande en utilisant : 
```bash
  composer install
```

- Importer Bootstrap et PHPMailer au projet :
```bash
  composer require twbs/bootstrap
  composer require phpmailer/phpmailer
```

## Utilisation 

- Une fois le dépôt récupérer, placer le fichier "projet-bonnefete" dans Applications\MAMP\htdocs. 
- Lancer votre serveur local (localhost sur Windows/Linux ou localhost:8889 sur MacOS) sur MAMP/XAMP. 
- Ouvrer le fichier "projet-bonnefete" dans votre IDE.
- Rendez-vous sur l'adresse "http://localhost:8888/projet-bonnefete/utilisateur/enregistrer" (par exemple) pour créer un compte utilisateur puis explorer les différentes fonctionnalités du site.


    
## Documentation

[SQL SH](https://sql.sh)

[PHP Documentation](https://www.php.net/docs.php)



## Badges

![HTML](https://img.shields.io/badge/HTML-5-orange)

![CSS](https://img.shields.io/badge/CSS-3-blue)

![JavaScript](https://img.shields.io/badge/JavaScript-ES6-yellow)

[![PHP](https://img.shields.io/badge/PHP-8.2.0-blue)](https://php.net/)

![MySQL](https://img.shields.io/badge/MySQL-8.0-blue)

![Bootstrap](https://img.shields.io/badge/Bootstrap-5.0-purple)

![Composer](https://img.shields.io/badge/Composer-2.1.3-blue)

![PHPMailer](https://img.shields.io/badge/PHPMailer-6.3.0-blue.svg)



## License

[Trello](https://trello.com/)

[Github](https://github.com/)

[MySQL](https://www.mysql.com/products/workbench/)

[PHP](https://www.php.net)

[Visual Studio code](https://code.visualstudio.com/download)

[MAMP](https://www.mamp.info/en/windows/)

[XAMPP](https://www.apachefriends.org/fr/index.html)

[PHPMailer](https://github.com/PHPMailer/PHPMailer)
 

## Crédits :
- DRAPIER Nicolas

- CARDOSO D'ALMEIDA Benjamin

Merci d'avoir pris le temps de lire le README.md, n'hésitez pas à apporter votre contribution, à signaler des problèmes ou à faire des suggestions d'amélioration !
