<?php 
    if (!isset($_COOKIE['token_sessao'])) {
        header("Location: index.php");
        exit;
      }
?>