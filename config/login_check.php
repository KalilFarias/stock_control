<?php 
    if (!isset($_COOKIE['token_sessao'])) {
        header("Location: ../login.php");
        exit;
      }
?>