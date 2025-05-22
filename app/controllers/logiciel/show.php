<?php
require 'bdd.php';
$id = $_GET['id'] ?? '';

// Recherche de la personne
$sql = 'SELECT * FROM logiciels WHERE id=:id';
$statement = $db->prepare($sql);
$statement->execute(compact('id'));
$logiciel = $statement->fetch();

if (!$logiciel) {
    header('location:CV.php');
    exit();
}

$page_title = "Afficher-$logiciel[logiciel]";

require '../app/views/logiciel/show.php';

