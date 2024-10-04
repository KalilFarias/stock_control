<?php

  session_start();

  include_once("connection.php");
  include_once("url.php");

  $data = $_POST;

  // MODIFICAÇÕES NO BANCO
  if(!empty($data)) {

    // Criar contato
    if($data["type"] === "create") {

      $name = $data["name"];
      $tool = $data["tool"];
      $patrimonio = $data["patrimonio"];
      $observation = $data["observation"];
      $date_retirada = $data["date_retirada"];
      $time_retirada = $data["time_retirada"];

      $query = "INSERT INTO stocks (name, tool, patrimonio, observation, date_retirada, time_retirada) VALUES (:name, :tool,:patrimonio, :observation, :date_retirada, :time_retirada)";

      $stmt = $conn->prepare($query);
      $stmt->bindParam(":name", $name);
      $stmt->bindParam(":patrimonio", $patrimonio);
      $stmt->bindParam(":tool", $tool);
      $stmt->bindParam(":observation", $observation);
      $stmt->bindParam(param: ":date_retirada", var: $date_retirada);
      $stmt->bindParam(param: ":time_retirada", var: $time_retirada);

      try {

        $stmt->execute();
        $_SESSION["msg"] = "Solicitação concluída com sucesso com sucesso!";
    
      } catch(PDOException $e) {
        // erro na conexão
        $error = $e->getMessage();
        echo "Erro: $error";
      }

    } else if($data["type"] === "edit") {

      $name = $data["name"];
      $tool = $data["tool"];
      $patrimonio = $data["patrimonio"];
      $observation = $data["observation"];
      $id = $data["id"];

      $query = "UPDATE stocks 
                SET name = :name, tool = :tool, patrimonio=:patrimonio, observation = :observation
                WHERE id = :id";

      $stmt = $conn->prepare($query);

      $stmt->bindParam(":name", $name);
      $stmt->bindParam(":tool", $tool);
      $stmt->bindParam(":patrimonio", $patrimonio);
      $stmt->bindParam(":observation", $observation);
      $stmt->bindParam(":id", $id);

      try {

        $stmt->execute();
        $_SESSION["msg"] = "solicitação concluída com sucesso";
    
      } catch(PDOException $e) {
        // erro na conexão
        $error = $e->getMessage();
        echo "Erro: $error";
      }

    } else if($data["type"] === "delete") {

      $query = "UPDATE stocks SET devolvido = 1, date_devolucao = CURRENT_DATE, time_devolucao = CURRENT_TIME WHERE id = :id";

      $id = $data["id"];

      $stmt = $conn->prepare($query);

      $stmt->bindParam(":id", $id);

      try {

        $stmt->execute();
        $_SESSION["msg"] = "Devolução concluida com sucesso!";
    
      } catch(PDOException $e) {
        // erro na conexão
        $error = $e->getMessage();
        echo "Erro: $error";
      }

      // Logar usuário
    } else if($data["type"] === "login") {
      $email = $data["email"];
      $senha = $data["senha"];

      $query = "SELECT id, nome, email, senha, is_admin FROM usuarios WHERE email = '$email'";
      $cliente_login = $conn->prepare($query);

      try {

        $cliente_login->execute();
        $cliente_login = $cliente_login->fetch(PDO::FETCH_ASSOC);
        #$_SESSION["msg"] = "Devolução concluida com sucesso!";
    
      } catch(PDOException $e) {
        // erro na conexão
        $error = $e->getMessage();
        echo "Erro: $error";
      }

      if(!empty($cliente_login)) {
        #Verifica se a senha confere
            if(password_verify($senha,$cliente_login['senha'])){ #A senha confere
                
                #Criar um token a partir de um HEX aleatório
                $token_sessao = bin2hex(random_bytes(32));

                #Definir a expiração do token (em segundos)
                $tempo_validade_token = 3600;
                $data_expiracao = date('Y-m-d H:i:s', time() + $tempo_validade_token);
                
                #Inserir o token no Banco
                $sql = "INSERT INTO sessoes (id, usuario_id, token, data_criacao, data_expiracao) VALUES (NULL, '$cliente_login[id]','$token_sessao', NOW(), '$data_expiracao')";
                $registrar_token = $conn->prepare($sql);
                $registrar_token->execute();
                
                #Armazenar o token de sessão como um cookie
                setcookie('token_sessao',$token_sessao, time() + $tempo_validade_token,  '/');
                $_SESSION['user_id'] = $cliente_login['id'];
                $_SESSION['user_name'] = $cliente_login['nome'];
                $_SESSION['is_admin'] = $cliente_login['is_admin'];
                #echo 'Usuário logado';

            } else { #A senha não confere
                #echo 'Senha incorreta';
                $_SESSION["msg"] = "Senha não confere";
                ?>
                <div class="alert alert-danger col-7 mx-auto" role="alert">
                    Usuário ou senha incorretos
                </div>
            <?php }
        } else {
            #echo "Usuário não encontrado";
            $_SESSION["msg"] = "Usuário não encontrado";
            ?>
                <div class="alert alert-danger col-7 mx-auto" role="alert">
                    Usuário ou senha incorretos
                </div>
            <?php
        }

      // Cadastrar Usuário
    } else if($data["type"] === "cadastrar-usuario") {
      $name = $data["nome"];
      $email = $data["email"];
      $senha = $data["senha"];
      $confirma_senha = $data["confirma-senha"];

      if ($senha != $confirma_senha) {
        $_SESSION['msg'] = "As senhas não são iguais";
      } else {
        $query = "SELECT id FROM usuarios WHERE email = :email";
        $busca_usuario = $conn->prepare($query);
        

        $busca_usuario->bindParam(":email", $email);
  
        try {
  
          $busca_usuario->execute();
          $busca_usuario = $busca_usuario->fetch(PDO::FETCH_ASSOC);
      
        } catch(PDOException $e) {
          // erro na conexão
          $error = $e->getMessage();
          echo "Erro: $error";
        }
        
        if (empty($busca_usuario)) {
          $senha = password_hash($senha,PASSWORD_DEFAULT);
          $query = "INSERT INTO usuarios (id, nome, email, senha, is_admin, apagado) VALUES (NULL, :nome, :email, :senha, 0, 0)";
          $stmt = $conn->prepare($query);
          
          $stmt->bindParam(":nome", $name);
          $stmt->bindParam(":email", $email);
          $stmt->bindParam(":senha", $senha);
    
          try {
    
            $stmt->execute();
            $_SESSION["msg"] = "Usuário Cadastrado com sucesso";
        
          } catch(PDOException $e) {
            // erro na conexão
            $error = $e->getMessage();
            echo "Erro: $error";
          }

        } else {
          $_SESSION["msg"] = "E-mail já cadastrado";
        }

      } 
      //Alterar a senha pelo próprio usuário
    } else if($data["type"] === "alterar-senha") {
      $user_id = $_SESSION['user_id'];
      $senha_atual = $data["senha-atual"];
      $nova_senha = $data["nova-senha"];
      $confirma_senha = $data["confirma-senha"];

      //Pegar a senha cadastrada no banco de dados
      $query = "SELECT id, senha FROM usuarios WHERE id = $user_id";
      $cliente_altera_senha = $conn->prepare($query);

      try {

        $cliente_altera_senha->execute();
        $cliente_altera_senha = $cliente_altera_senha->fetch(PDO::FETCH_ASSOC);
        #$_SESSION["msg"] = "Devolução concluida com sucesso!";
    
      } catch(PDOException $e) {
        // erro na conexão
        $error = $e->getMessage();
        echo "Erro: $error";
      }

      // Verifica se a senha confere
      if(!empty($cliente_altera_senha)) {

            if(password_verify($senha_atual, $cliente_altera_senha['senha'])){ #A senha confere
              if ($nova_senha == $confirma_senha) { //A nova senha confere
                //Encriptar a nova senha
                $nova_senha = password_hash($nova_senha,PASSWORD_DEFAULT);
                $query = "UPDATE usuarios SET senha = :nova_senha WHERE id = $user_id"; //Atualiza a senha

                $stmt = $conn->prepare($query);
                $stmt->bindParam(":nova_senha",$nova_senha);

                try {
                  $stmt->execute();
                  $_SESSION['msg'] = "Senha alterada com sucesso";
                  
                } catch (PDOException $e){
                  // erro na conexão
                  $error = $e->getMessage();
                  echo "Erro: $error";
                }
              } else { 
                //As senhas digitadas são diferentes
                $_SESSION['msg'] = "A nova senha informada foi digitada diferente";
              }

            } else { #A senha não confere
                #echo 'Senha incorreta';
                $_SESSION["msg"] = "Senha não confere";
                ?>
                <div class="alert alert-danger col-7 mx-auto" role="alert">
                    Usuário ou senha incorretos
                </div>
            <?php }
        } else {
            #echo "Usuário não encontrado";
            $_SESSION["msg"] = "Usuário não encontrado";
            ?>
                <div class="alert alert-danger col-7 mx-auto" role="alert">
                    Usuário ou senha incorretos
                </div>
            <?php
        }

      // Resetar a senha pelo admin
    } else if($data["type"] === "reset-senha") {
      $email_reset = $data['email-reset'];
      $nova_senha = $data["nova-senha"];
      $confirma_senha = $data["confirma-senha"];

      //Pegar a senha cadastrada no banco de dados
      $query = "SELECT id, senha FROM usuarios WHERE email = '$email_reset'";
      $cliente_reset_senha = $conn->prepare($query);

      try {

        $cliente_reset_senha->execute();
        $cliente_reset_senha = $cliente_reset_senha->fetch(PDO::FETCH_ASSOC);
        #$_SESSION["msg"] = "Devolução concluida com sucesso!";
    
      } catch(PDOException $e) {
        // erro na conexão
        $error = $e->getMessage();
        echo "Erro: $error";
      }

      if(!empty($cliente_reset_senha)) {
        if ($nova_senha == $confirma_senha) { //A nova senha confere
          //Encriptar a nova senha
          $nova_senha = password_hash($nova_senha,PASSWORD_DEFAULT);
          $query = "UPDATE usuarios SET senha = :nova_senha WHERE id = :cliente_reset_id"; //Atualiza a senha

          $stmt = $conn->prepare($query);
          $stmt->bindParam(":nova_senha",$nova_senha);
          $stmt->bindParam(":cliente_reset_id",$cliente_reset_senha['id']);

          try {
            $stmt->execute();
            $_SESSION['msg'] = "Senha alterada com sucesso";
            
          } catch (PDOException $e){
            // erro na conexão
            $error = $e->getMessage();
            echo "Erro: $error";
          }
        } else { 
          //As senhas digitadas são diferentes
          $_SESSION['msg'] = "A nova senha informada foi digitada diferente";
        }
        } else {
            #echo "Usuário não encontrado";
            $_SESSION["msg"] = "Usuário não encontrado";
            ?>
                <div class="alert alert-danger col-7 mx-auto" role="alert">
                    Usuário ou senha incorretos
                </div>
            <?php
        }

    }

    // Redirect HOME
    header("Location:" . $BASE_URL . "../index.php");

  // SELEÇÃO DE DADOS
  } else {
    
    $id;

    if(!empty($_GET)) {
      $id = $_GET["id"];
    }

    // Retorna o dado de um contato
    if(!empty($id)) {

      $query = "SELECT * FROM stocks WHERE id = :id";

      $stmt = $conn->prepare($query);

      $stmt->bindParam(":id", $id);

      $stmt->execute();

      $stock = $stmt->fetch();

    } else {

      // Retorna todos os contatos
      $stock = [];

      $query = "SELECT * FROM stocks WHERE devolvido = 0";

      $stmt = $conn->prepare($query);

      $stmt->execute();
      
      $stock = $stmt->fetchAll();

    }

  }

  // FECHAR CONEXÃO
  $con = null;