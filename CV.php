<?php
require 'bdd.php';

// Requête pour récupérer les logiciels
$sql = 'SELECT * FROM logiciels';
$statement = $db->prepare($sql);
$statement->execute();
$liste_logiciel = $statement->fetchAll();

$page_title = 'CV';
?>
<!DOCTYPE html>
<html lang='fr'>
<?php require 'head.php'; ?>

<body>
    <?php include('header.php'); ?>

    <main class="create">

        <section class="create-section">
            <h2 class="fade-in">Coordonnées :</h2>
            <ul>
                <li class="fade-in fade-in-delay">Mon mail est questeclement@gmail.com</li>
                <li class="fade-in fade-in-delay">Mon numéro de téléphone portable est 07 66 31 98 31</li>
                <li class="fade-in fade-in-delay">J'habite à Calais, 75 Boulevard Léon Gambetta (62)</li>
                <li class="fade-in fade-in-delay">J'ai eu 18 ans le 16 novembre 2025</li>
            </ul>
        </section>

        <section class="create-section">
            <h2 class="fade-in">Diplômes et Formation :</h2>
            <ul>
                <li class="fade-in fade-in-delay">Brevet des collèges Mention Très Bien – Juillet 2021, Collège Bernard Chochoy</li>
                <li class="fade-in fade-in-delay">Baccalauréat Général Mention Assez Bien – Juillet 2024, Lycée Anatole France</li>
                <li class="fade-in fade-in-delay">En cours : DEUST WMI (2024–2026), ULCO Calais</li>
            </ul>
        </section>

        <section class="create-section">
            <h2 class="fade-in">Expériences Professionnelles :</h2>
            <ul>
                <li class="fade-in fade-in-delay">Stage – Cartonnages Vaillant, Juin 2022 à Trézennes</li>
            </ul>
        </section>

        <section class="create-section">
            <h2 class="fade-in">Compétences :</h2>
            <a href='create.php'><button>Ajouter un logiciel</button></a>
            <ul>
                <?php foreach ($liste_logiciel as $logiciel): ?>
                    <li class="fade-in fade-in-delay">
                        <a href='logiciel_show.php?id=<?= htmlspecialchars($logiciel['id']) ?>'>
                            <img src='images/cv/<?= htmlspecialchars($logiciel['image']) ?>' alt='Image de <?= htmlspecialchars($logiciel['logiciel']) ?>' />
                        </a>
                        <p><strong><?= htmlspecialchars($logiciel['logiciel']) ?></strong><br>
                        <?= htmlspecialchars($logiciel['description']) ?></p>
                        <a href='logiciel_update.php?id=<?= $logiciel['id'] ?>'><button>Modifier</button></a>
                        <a href='logiciel_delete.php?id=<?= $logiciel['id'] ?>'><button>Supprimer</button></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>

        <section class="create-section">
            <h2 class="fade-in">Langues :</h2>
            <ul>
                <li class="fade-in fade-in-delay">Anglais : niveau B2</li>
                <li class="fade-in fade-in-delay">Espagnol : niveau B2</li>
            </ul>
        </section>

        <section class="create-section">
            <h2 class="fade-in">Qualités :</h2>
            <ul>
                <li class="fade-in fade-in-delay">Capacité à travailler en équipe</li>
                <li class="fade-in fade-in-delay">Motivation</li>
                <li class="fade-in fade-in-delay">Curiosité</li>
                <li class="fade-in fade-in-delay">Créativité</li>
            </ul>
        </section>

        <section class="create-section">
            <h2 class="fade-in">Loisirs :</h2>
            <ul>
                <li class="fade-in fade-in-delay">Basket-ball (1 an, club de Lillers)</li>
                <li class="fade-in fade-in-delay">Couture et mode</li>
                <li class="fade-in fade-in-delay">Musique : écoute et création</li>
                <li class="fade-in fade-in-delay">Football (10 ans, club de Norrent-Fontes)</li>
            </ul>
        </section>

    </main>

    <?php include('footer.php'); ?>
    <script src="script.js"></script>
</body>
</html>

