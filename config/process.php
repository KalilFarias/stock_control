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
      $observation = $data["observation"];
      $date_retirada = $data["date_retirada"];
      $time_retirada = $data["time_retirada"];

      $query = "INSERT INTO stocks (name, tool, observation, date_retirada, time_retirada) VALUES (:name, :tool, :observation, :date_retirada, :time_retirada)";

      $stmt = $conn->prepare($query);
      $stmt->bindParam(":name", $name);
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
      $observation = $data["observation"];
      $id = $data["id"];

      $query = "UPDATE stocks 
                SET name = :name, tool = :tool, observation = :observation 
                WHERE id = :id";

      $stmt = $conn->prepare($query);

      $stmt->bindParam(":name", $name);
      $stmt->bindParam(":tool", $tool);
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

      $query = "UPDATE  stocks set devolvido = 1 WHERE id=:id";

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

      $query = "SELECT id, nome, email, senha FROM usuarios WHERE email = '$email'";
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
                
                #Inserir o token no Banco
                $sql = "INSERT INTO sessoes (id, usuario_id, token, data_criacao) VALUES (NULL, '$cliente_login[id]','$token_sessao',NOW())";
                $registrar_token = $conn->prepare($sql);
                $registrar_token->execute();
                
                #Armazenar o token de sessão como um cookie
                setcookie('token_sessao',$token_sessao, time() + 3600,  '/');
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
  #TESTESTESTE