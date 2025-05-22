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

?>
<!DOCTYPE html>
<html lang='fr'>

<?php require 'head.php' ?>

<body>
    <?php require 'header.php' ?>

    <main>
        <h1>Afficher</h1>

        <section>
            <img src='images/cv/<?= $logiciel['image'] ?>' alt='image <?= $logiciel['logiciel'] ?>' />
            <?= $logiciel['logiciel'] ?>
            <?= $logiciel['description'] ?>
        </section>
    </main>

    <?php require 'footer.php' ?>
</body>

</html>
