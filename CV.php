<?php
require 'bdd.php';
// création de la requête
$sql = 'SELECT * FROM personnes';
// envoi de la requête et récupération du résultat
$statement = $db->prepare($sql);
$statement->execute();

$liste_logiciel = $statement->fetchAll();
$page_title = 'CV'
?>
<!DOCTYPE html>
<html lang='fr'>

<?php require 'head.php';?>
<body>

    <?php include('header.php'); ?>

    <main class="create">
    <section class="create-section">
        <h2 class="fade-in" style="animation-delay: 0s;">Coordonnées:</h2>
            <li class="fade-in fade-in-delay" style="animation-delay: 0.5s;">Mon mail est questeclement@gmail.com</li>
            <li class="fade-in fade-in-delay" style="animation-delay: 0.5s;">Mon numéro de téléphone portable est 0766319831</li>
            <li class="fade-in fade-in-delay" style="animation-delay: 0.5s;">J'habite à Calais 75 Boulevard Léon Gambetta dans le 62</li>
            <li class="fade-in fade-in-delay" style="animation-delay: 0.5s;">J'ai eu 18 ans le 16 novembre 2025</li>
    </section>

    <section class="create-section">
        <h2 class="fade-in" style="animation-delay: 0s;">Diplômes et Formation:</h2>
            <li class="fade-in fade-in-delay" style="animation-delay: 0.5s;">J'ai obtenue mon Brevet des collèges Mention très bien en Juillet 2021 à Bernard Chochoy Norrent-Fontes.</li>
            <li class="fade-in fade-in-delay" style="animation-delay: 0.5s;">J'ai obtenue mon Baccalauréat Général Mention Assez Bien en Juillet 2024 à Anatole France Lillers.</li>
            <li class="fade-in fade-in-delay" style="animation-delay: 0.5s;">Je suis en cours d'optention du dîplome Deust WMI depuis septembre 2024 à l'ULCO de Calais.</li>
    </section>

    <section class="create-section">
        <h2 class="fade-in" style="animation-delay: 0s;">Expériences Professionnelles:</h2>
            <li class="fade-in fade-in-delay" style="animation-delay: 0.5s;">J'ai fait un stage aux Cartonnages Vaillant en juin 2022 à Trezennes.</li>
    </section>

    <section class="create-section">
    <h2 class="fade-in" style="animation-delay: 0s;">Compétences :</h2>
    <a href='create.php'><button>Ajouter</button></a>
        <ul>
            <?php
            foreach ($liste_logiciel as $logiciel) {
                ?>
                <li>
                    <a href='show.php?id=<?= $logiciel['id'] ?>'>
                        <img src='iamges/cv/<?= $logiciel['image'] ?>' alt='img <?= $logiciel['logiciel'] ?>' />
                    </a>
                    <?= $logiciel['logiciel'] ?>
                    <?= $logiciel['description'] ?>
                    <a href='delete.php?id=<?= $logiciel['id'] ?>'>
                        <img src='images/cv/css.png' alt='supprimer' />
                    </a>
                    <a href='update.php?id=<?= $logiciel['id'] ?>'>
                        <img src='images/cv/css.png' alt='modifier' />
                    </a>
                </li>
                <?php
            }
            ?>
        </ul>
    </section>

    <section class="create-section">
        <h2 class="fade-in" style="animation-delay: 0s;">Langues:</h2>
            <li class="fade-in fade-in-delay" style="animation-delay: 0.5s;">Anglais j'ai le niveau B2</li>
            <li class="fade-in fade-in-delay" style="animation-delay: 0.5s;">Espagnol j'ai le niveau B2</li>
    </section>

    <section class="create-section">
        <h2 class="fade-in" style="animation-delay: 0s;">Qualités:</h2>
            <li class="fade-in fade-in-delay" style="animation-delay: 0.5s;">Je sais Travailler en équipe</li>
            <li class="fade-in fade-in-delay" style="animation-delay: 0.5s;">Je suis quelqu'un de très motivé</li>
            <li class="fade-in fade-in-delay" style="animation-delay: 0.5s;">Je suis quelqu'un de très curieux</li>
            <li class="fade-in fade-in-delay" style="animation-delay: 0.5s;">J'ai beaucoup de Créativité</li>
    </section>

    <section class="create-section">
        <h2 class="fade-in" style="animation-delay: 0s;">Loisirs:</h2>
            <li class="fade-in fade-in-delay" style="animation-delay: 0.5s;">J'ai pratiqué le Basket-Ball pendant une année au club de Lillers.</li>
            <li class="fade-in fade-in-delay" style="animation-delay: 0.5s;">J'adore les vêtements et la couture</li>
            <li class="fade-in fade-in-delay" style="animation-delay: 0.5s;">La Music me passione de son écoute à la création</li>
            <li class="fade-in fade-in-delay" style="animation-delay: 0.5s;">J'ai pratiqué le Football pendant 10 années au club de Norrent-Fontes.</li>
    </section>
    </main>


    <?php include('footer.php'); ?>

    <script src="script.js"></script>
</body>
</html>