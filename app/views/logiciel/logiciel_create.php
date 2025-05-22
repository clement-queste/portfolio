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
?>

<!DOCTYPE html>
<html lang='fr'>
<?php require 'head.php'; ?>

<body>
<?php require 'header.php'; ?>

<main>
    <h1>Ajouter un logiciel</h1>
    <form action='' method='post' enctype='multipart/form-data'>

        <div>
            <label for='logiciel'>Nom du logiciel</label>
            <input type='text' name='logiciel' id='logiciel' required>
        </div>

        <div>
            <label for='description'>Description</label>
            <textarea name='description' id='description' rows='4' required></textarea>
        </div>

        <div>
            <label for='slug'>Slug (sans espace ni accent)</label>
            <input type='text' name='slug' id='slug' required>
        </div>

        <div>
            <label for='image'>Image</label>
            <input type='file' name='image' id='image' accept=".jpg,.jpeg,.png,.gif,.webp">
        </div>

        <div>
            <button type='submit' name='ajouter'>Ajouter</button>
            <a href='CV.php'><button type='button'>Annuler</button></a>
        </div>

    </form>
</main>

<?php require 'footer.php'; ?>
</body>
</html>
