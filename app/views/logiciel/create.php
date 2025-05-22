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