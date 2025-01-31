<?php
    require 'config.php';
    
    $nome = filter_input(INPUT_POST, 'name');
    $email = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL);
    
    if($nome && $email) {

        $sql = $pdo ->prepare('SELECT * FROM usuario WHERE user = :email');
        $sql -> bindValue(':email', $email);
        $sql -> execute();

        if($sql -> rowCount() === 0) {
            $sql = $pdo ->prepare("INSERT INTO usuario (name, user) VALUES (:nome, :email)");
            $sql -> bindValue(':nome', $nome);
            $sql -> bindValue(':email', $email);
            $sql ->execute();
        
            header('Location: index.php');
            exit;
        } else {
            header('Location: cadastrar.php');
        }

    } else {
        header('Location: cadastrar.php');
        exit;
    }

