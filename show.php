<?php
  include_once("templates/header.php");
?>
  <div class="container" id="view-contact-container"> 
    <?php include_once("templates/backbtn.html"); ?>
    <h1 id="main-title"><?= $stock["name"] ?></h1>
    <p class="bold">Ferramenta:</p>
    <p><?= $stock["tool"] ?></p>
    <p class="bold">Observações:</p>
    <p><?= $stock["observation"] ?></p>
  </div>
<?php
  include_once("templates/footer.php");
?>
