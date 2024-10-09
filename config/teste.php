<?php
    session_start();
    $_SESSION['test'] = 'Teste de sessão';
    var_dump($_SESSION);
    exit();
?>