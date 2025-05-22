<?php
require 'bdd.php';

$id = $_GET['id'] ?? '';

if (!$id) {
    header('Location: CV.php');
    exit();
}

// Récupérer le nom de l'image avant suppression
$sql = 'SELECT image FROM logiciels WHERE id = :id';
$stmt = $db->prepare($sql);
$stmt->execute(['id' => $id]);
$logiciel = $stmt->fetch();

if ($logiciel) {
    $imagePath = 'images/cv/' . $logiciel['image'];
    if (file_exists($imagePath)) {
        unlink($imagePath); // Supprime l'image du dossier
    }

    // Supprimer l'enregistrement de la base
    $sql = 'DELETE FROM logiciels WHERE id = :id';
    $stmt = $db->prepare($sql);
    $stmt->execute(['id' => $id]);
}

header('Location: CV.php');
exit();