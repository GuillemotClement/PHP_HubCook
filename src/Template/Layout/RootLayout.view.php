<?php
require BASE_PATH."src/Template/Partials/head.php";
require BASE_PATH."src/Template/Partials/header.php";
?>

  <main class="flex-1 container mx-auto py-6">
    <?php require BASE_PATH."src/Template/Pages/$page.view.php"?>
  </main>

<?php
require BASE_PATH."src/Template/Partials/footer.php";