<?php 

$listelogiciels = [
    ['id'=>'1','logi'=>'Premier Pro'],
    ['id'=>'2','logi'=>'Photoshop'],
    ['id'=>'3','logi'=>'Indesign'],
    ['id'=>'4','logi'=>'Illustrator'],
    ['id'=>'5','logi'=>'After Effects'],
    ['id'=>'6','logi'=>'Html'],
    ['id'=>'7','logi'=>'CSS'],
    ['id'=>'8','logi'=>'JavaScript']
];

$photoshop = [
    ['id'=>'1','logi'=>'Premier Pro'],
    ['id'=>'2','logi'=>'Photoshop'],
    ['id'=>'3','logi'=>'Indesign'],
    ['id'=>'4','logi'=>'Illustrator'],
    ['id'=>'5','logi'=>'After Effects'],
    ['id'=>'6','logi'=>'Html'],
    ['id'=>'7','logi'=>'CSS'],
    ['id'=>'8','logi'=>'JavaScript']
];



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