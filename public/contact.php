<?php
$page_title = 'Contact'?>
<!DOCTYPE html>
<html lang='fr'>

<?php require '../app/views/head.php';?>
<body>

    <?php include('../app/views/header.php'); ?>

    <main class="create">
    <section class="create-section">
      <h2 class="fade-in">Contactez-moi</h2>
      <?php if ($confirmation): ?>
        <p class="fade-in fade-in-delay confirmation"><?= htmlspecialchars($confirmation) ?></p>
      <?php endif; ?>
    </section>

    <form action="" method="post" class="contact-form fade-in fade-in-delay">
      <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($nom) ?>" required>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>" required>
      </div>

      <div class="form-group">
        <label for="message">Message</label>
        <textarea id="message" name="message" rows="6" required><?= htmlspecialchars($message) ?></textarea>
      </div>

      <div class="form-button">
        <button type="submit" class="toggle-btn">Envoyer</button>
      </div>
    </form>
  </main>


    <?php include('../app/views/footer.php'); ?>

    <script src="script.js"></script>
</body>
</html>
