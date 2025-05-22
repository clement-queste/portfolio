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