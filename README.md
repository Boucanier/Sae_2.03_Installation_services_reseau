# Sae_2.03_Installation_services_reseau

![Cent OS](https://img.shields.io/badge/cent%20os-002260?style=for-the-badge&logo=centos&logoColor=F0F0F0)
![Apache](https://img.shields.io/badge/apache-%23D42029.svg?style=for-the-badge&logo=apache&logoColor=white)
![MySQL](https://img.shields.io/badge/mysql-%2300f.svg?style=for-the-badge&logo=mysql&logoColor=white)
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)

SAÉ 2.03 : Installation de services réseaux

## Présentation

Présentation

## Installation du serveur

Pour installer le serveur sur une machine CentOS, téléchargez puis décompressez le dépôt dans le dossier de votre choix __sans le renommer__. Puis, passez en __root__ (_```su - ```_) et exécutez le script _installation.sh_ à l'intérieur du dossier décompressé.
Le serveur est maintenant installé et fonctionnel. Le dossier des pages est de base dans le répertoire _/var/www/html/S203_ mais il peut être changé en modifiant la _DocumentRoot_ dans le fichier _httpd.conf_.

## Contenu

* Fichier [index.html](index.html) : page d'accueil du site
* Répertoire _pages_ contenant :
    * [reserv_salles.php](pages/reserv_salles.php) : page contenant le formulaire de réservation de salle
    * [conclusion_salles.php](pages/reserv_salles.php) : page indiquant le récapitulatif d'une réservation, insertions dans la base de données
    * [info.php](pages/info.php) : contient les informations de configuration du serveur
    * [image.php](pages/image.php) : affiche une image redimensionnée
* Répertoire _css_ contenant l'unique [feuille de style](css/style_sae.css) utilisée pour le site
* Répertoire _images_ contenant les images utilisées dans les pages
* [Script d'installation](installation.sh) permettant d'installer rapidement le serveur sur une distribution de CentOS
* [Script SQL de création](creation_s203.sql) permettant de créer la base de données et l'utilisateur utilisés par le serveur
