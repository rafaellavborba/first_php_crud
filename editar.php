<?php
    require 'config.php';

    $user = [];
    $id = filter_input(INPUT_GET,'id');
    
    if($id){
        $sql = $pdo ->prepare('SELECT * FROM usuario WHERE id = :id');
        $sql ->bindValue('id', $id, PDO::PARAM_INT);
        $sql -> execute();
        
        if($sql ->rowCount() > 0){
            $user = $sql -> fetch(PDO::FETCH_ASSOC);
        } else {
            header('Location: index.php');
            exit;
        }
    } else {
        header('Location: index.php');
    }
?>

<h1>Editar usuario</h1>
<form method="post" action="editar_action.php">
    <input type="hidden" name="id" value="<?=$user['id'];?>"/>
    <label>
        Nome: <input type="text" name="name" value="<?=$user['name'];?>"/>
    </label>
    <label>
        Email: <input type="email" name="email" value="<?=$user['user']?>"/>
    </label>
    <input type="submit" value="Atualizar"/>
</form>
