<?php
    header('Content-Type: image/jpeg');

    $chemin_image = "/var/www/html/S203/images/golem.jpg"; // Chemin d'accès complet à l'image

    // Chargement de l'image
    $image_source = imagecreatefromjpeg($chemin_image);

    // Récupération des dimensions de l'image originale
    $largeur_originale = imagesx($image_source);
    $hauteur_originale = imagesy($image_source);

    // Calcul des dimensions de l'image réduite
    $nouvelle_largeur = 700; // Largeur souhaitée pour l'image réduite
    $ratio = $nouvelle_largeur / $largeur_originale; // Calcul du ratio de réduction
    $nouvelle_hauteur = $hauteur_originale * $ratio; // Calcul de la hauteur en fonction du ratio

    // Création de l'image réduite
    $image_reduite = imagescale($image_source, $nouvelle_largeur, $nouvelle_hauteur);

    // Affichage de l'image réduite
    imagejpeg($image_reduite);

    // Libération de la mémoire
    imagedestroy($image_source);
    imagedestroy($image_reduite);
?>
