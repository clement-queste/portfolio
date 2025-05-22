<?php
require 'bdd.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Identifiant manquant.");
}

$id = intval($_GET['id']);

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $logiciel = $_POST['logiciel'];
    $image = $_POST['image'];
    $description = $_POST['description'];
    $slug = $_POST['slug'];

    $sql = "UPDATE logiciels SET logiciel = :logiciel, image = :image, description = :description, slug = :slug WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute([
        ':logiciel' => $logiciel,
        ':image' => $image,
        ':description' => $description,
        ':slug' => $slug,
        ':id' => $id
    ]);

    header('Location: CV.php');
    exit();
}

// Récupération des données existantes
$sql = "SELECT * FROM logiciels WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->execute([':id' => $id]);
$logiciel = $stmt->fetch();

if (!$logiciel) {
    die("Logiciel non trouvé.");
}

require '../app/views/logiciel/update.php';