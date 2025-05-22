<?php
require 'bdd.php';
$page_title = 'Ajouter un logiciel';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ajouter'])) {
    // Récupération des données du formulaire
    $logiciel = trim($_POST['logiciel'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $slug = trim($_POST['slug'] ?? '');

    // Insertion dans la base de données
    $sql = "INSERT INTO logiciels (logiciel, description, slug) 
            VALUES (:logiciel, :description, :slug)";
    $statement = $db->prepare($sql);
    $statement->execute(compact('logiciel', 'description', 'slug'));

    $id = $db->lastInsertId();

    // Gestion de l’image
    $image = $id . "_" . $slug . ".png"; // Valeur par défaut
    if (isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
        $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        if (in_array($extension, $allowed)) {
            $image = $id . "_" . $slug . "." . $extension;
            move_uploaded_file($_FILES['image']['tmp_name'], "images/cv/$image");
        }
    } else {
        // Image par défaut
        copy('photos/photo.png', "images/cv/$image");
    }

    // Mise à jour de l’image dans la base
    $sql = "UPDATE logiciels SET image = :image WHERE id = :id";
    $statement = $db->prepare($sql);
    $statement->execute(compact('image', 'id'));

    // Redirection
    header('Location: CV.php');
    exit();
}

require '../app/views/logiciel/create.php';