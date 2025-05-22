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
?>

<!DOCTYPE html>
<html lang="fr">
<?php require 'head.php'; ?>

<body>
<?php include('header.php'); ?>

<main class="create">
    <section class="create-section">
        <h2>Modifier un logiciel</h2>
        <form method="post">
            <label for="logiciel">Nom du logiciel :</label><br>
            <input type="text" name="logiciel" id="logiciel" value="<?= htmlspecialchars($logiciel['logiciel']) ?>" required><br><br>

            <label for="image">Nom de l'image (ex: photoshop.png) :</label><br>
            <input type="text" name="image" id="image" value="<?= htmlspecialchars($logiciel['image']) ?>" required><br><br>

            <label for="description">Description :</label><br>
            <textarea name="description" id="description" required><?= htmlspecialchars($logiciel['description']) ?></textarea><br><br>

            <label for="slug">Slug :</label><br>
            <input type="text" name="slug" id="slug" value="<?= htmlspecialchars($logiciel['slug']) ?>" required><br><br>

            <button type="submit">Mettre à jour</button>
            <a href="CV.php"><button type="button">Annuler</button></a>
        </form>
    </section>
</main>

<?php include('footer.php'); ?>
<script src="script.js"></script>
</body>
</html>
