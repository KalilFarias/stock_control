<?php
  include_once("templates/header.php");
?>
  <div class="container" id="view-contact-container"> 
    <?php include_once("templates/backbtn.html"); ?>
    <h1 id="main-title"><?= $contact["name"] ?></h1>
    <p class="bold">Ferramenta:</p>
    <p><?= $contact["tool"] ?></p>
    <p class="bold">Observações:</p>
    <p><?= $contact["observation"] ?></p>
  </div>
<?php
  include_once("templates/footer.php");
?>
