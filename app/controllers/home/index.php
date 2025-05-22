<?php
$page_title = 'Accueil'?>
<!DOCTYPE html>
<html lang='fr'>

<?php require '../app/views/head.php';?>
<body>

  <?php include('../app/views/header.php'); ?>

  <main class="hero">
    <div>
      <h2 class="fade-in" style="animation-delay: 0s;">Bienvenue sur mon Portfolio</h2>
      <p class="fade-in fade-in-delay" style="animation-delay: 0.5s;">
        Découvrez mes projets, mon parcours et mes compétences !
      </p>
      <button class="toggle-btn fade-in fade-in-delay" style="animation-delay: 1s;">
        Contactez-moi
      </button>
    </div>
  </main>

  <?php include('../app/views/footer.php'); ?>
  

  <script src="script.js"></script>
</body>
</html>