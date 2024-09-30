<?php
  include_once("templates/header.php");
?>
  <div class="container" id="view-contact-container"> 
    <?php include_once("templates/backbtn.html"); ?>
    <H1 id="main-title" >Pedido ativo</H1>

    <P class="bold">Solicitante</P>
    <p><?= $stock["name"] ?></p>
    <p class="bold">Ferramenta:</p>
    <p><?= $stock["tool"] ?></p>
    <p class="bold">Data:</p>
    <p><?= $stock["date"] ?></p>
    <p class="bold">Horário:</p>
    <p><?= $stock["time"] ?></p>
    <p class="bold">Observações:</p>
    <p><?= $stock["observation"] ?></p>
  </div>
<?php
  include_once("templates/footer.php");
?>
