<?php

$listelogiciels = [
    ['id' => '1', 'logi' => 'Premiere Pro', 'img' => 'images/cv/premiere_pro.png','txt'=>' '],
    ['id' => '2', 'logi' => 'Photoshop', 'img' => 'images/cv/photoshop.png','txt'=>' '],
    ['id' => '3', 'logi' => 'Indesign', 'img' => 'images/cv/indesign.png','txt'=>' '],
    ['id' => '4', 'logi' => 'Illustrator', 'img' => 'images/cv/illustrator.png','txt'=>' '],
    ['id' => '5', 'logi' => 'After Effects', 'img' => 'images/cv/after_effects.png','txt'=>' '],
    ['id' => '6', 'logi' => 'Html', 'img' => 'images/cv/html.png','txt'=>' '],
    ['id' => '7', 'logi' => 'CSS', 'img' => 'images/cv/css.png','txt'=>' '],
    ['id' => '8', 'logi' => 'JavaScript', 'img' => 'images/cv/javascript.png','txt'=>' ']
];


























//                Contact


$nom = $_POST['nom'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';
$confirmation = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($nom) && !empty($email) && !empty($message)) {
        // Ici tu pourrais envoyer un email ou stocker les données
        $confirmation = "Merci $nom, votre message a bien été envoyé.";
    } else {
        $confirmation = "Merci de remplir tous les champs.";
    }
}