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

      $query = "INSERT INTO stocks (name, tool, observation) VALUES (:name, :tool, :observation)";

      $stmt = $conn->prepare($query);

      $stmt->bindParam(":name", $name);
      $stmt->bindParam(":tool", $tool);
      $stmt->bindParam(":observation", $observation);

      try {

        $stmt->execute();
        $_SESSION["msg"] = "Contato criado com sucesso!";
    
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
        $_SESSION["msg"] = "Contato atualizado com sucesso!";
    
      } catch(PDOException $e) {
        // erro na conexão
        $error = $e->getMessage();
        echo "Erro: $error";
      }

    } else if($data["type"] === "delete") {

      $id = $data["id"];

      $query = "DELETE FROM stocks WHERE id = :id";

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

      $query = "SELECT * FROM stocks";

      $stmt = $conn->prepare($query);

      $stmt->execute();
      
      $stock = $stmt->fetchAll();

    }

  }

  // FECHAR CONEXÃO
  $con = null;