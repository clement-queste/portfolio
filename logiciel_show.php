<?php
require 'bdd1.php';

$id = $_GET['id'] ?? '';
$logiciel = current(array_filter($listelogiciels, fn($l) => $l['id'] === $id));

if (!$logiciel) {
    header('Location: personnes.php');
    exit();
}

$page_title = 'Afficher - ' . htmlspecialchars($logiciel['logi']);
?>
<?php
$page_title = 'Accueil'?>
<!DOCTYPE html>
<html lang='fr'>

<?php require 'head.php';?>

<body>
  <?php require 'header.php'; ?>

  <main>
    <h1><?= ($logiciel['logi']) ?></h1>

    <section>
      <img src="<?= ($logiciel['img']) ?>" alt="<?= ($logiciel['logi']) ?>" />
      <p><?=($logiciel['txt']) ?></p>
    </section>
  </main>

  <?php require 'footer.php'; ?>
</body>
</html>
