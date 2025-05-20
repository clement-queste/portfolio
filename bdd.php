<?php
// ouverture de la connexion
$host = "localhost";
$dbname = "queste";
$port = "3306";
$username = 'root';
$password = 'root';

$dsn = "mysql:host=$host;port=$port;dbname=$dbname";
$options = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'];

$db = new PDO($dsn, $username, $password, $options);

























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