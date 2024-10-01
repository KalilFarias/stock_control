<?php
  include_once("templates/header.php");
  if(isset($_COOKIE['token_sessao']))  {
    echo "Reconheci que há um token salvo nos cookies";
    $token_sessao = $_COOKIE['token_sessao'];
    
    $sql = "DELETE FROM sessoes WHERE token = '$token_sessao'";
    $deleta_token = $conn->prepare($sql);
    $deleta_token->execute();
    echo "Token deletado do banco";
    setcookie('token_sessao','',time() - 3600,'/');
    session_destroy();
    $_SESSION['user_id'] = -1;
    header("Location: index.php");
    }
?>