<?php
include_once ('connection.php');

// Verifica se a sessão do usuário está inativa
if (!isset($_SESSION['user_id'])) {
    
    // Verifica se o cookie de autenticação existe
    if (isset($_COOKIE['token_sessao'])) {
        
        // Busca o usuário pelo token no banco de dados
        $sql_user_logado = 
            "SELECT usuarios.id, usuarios.nome, usuarios.is_admin, sessoes.token 
            FROM usuarios
            JOIN sessoes ON usuarios.id = sessoes.usuario_id
            WHERE sessoes.token = :auth_token";

        //$stmt_user_logado = $conn->prepare($sql_user_logado);
        $stmt_user_logado = $conn->prepare($sql_user_logado);
        $stmt_user_logado->bindParam(":auth_token", $_COOKIE['token_sessao']);

        try {
            $stmt_user_logado->execute();
            $usuario_logado = $stmt_user_logado->fetch();
    
            // Se o usuário for encontrado, restaura a sessão
            if ($usuario_logado) {
                /*echo "<pre>";
                echo "Usuário encontrado";
                print_r($usuario_logado);
                echo "</pre>";*/
                $_SESSION['user_id'] = $usuario_logado['id'];
                $_SESSION['user_name'] = $usuario_logado['nome'];
                $_SESSION['is_admin'] = $usuario_logado['is_admin'];
            } else {
                // Se o token não for válido, destrói a sessão
                session_destroy();
            }

        } catch(PDOException $e) {
            // erro na conexão
            $error = $e->getMessage();
            echo "Erro: $error";
        }

    } else {
        // Se não houver sessão e nenhum cookie, redireciona para a página de login
    }
}
?>
