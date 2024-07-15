<?php 
    require 'config.php';
    $data = [];
    $sql = $pdo ->query('SELECT * FROM usuario');

    if($sql ->rowCount() > 0) {
        $data = $sql ->fetchAll(PDO::FETCH_ASSOC);
    }
?>

<h1>Listagem de Usuários</h1>
<table  border="1">
    <tr>
        <th>ID:</th>
        <th>Nome:</th>
        <th>Email:</th>
        <th>Ações:</th>
    </tr>
    <?php foreach($data as $user): ?>
        <tr>
            <td><?=$user['id'];?></td>
            <td><?=$user['name'];?></td>
            <td><?=$user['user'];?></td>
            <td>
                <a href="editar.php?id=<?=$user['id'];?>">[Editar]</a>
                <a href="excluir.php?id=<?=$user['id'];?>">[Excluir]</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="cadastrar.php">Cadastrar usuário</a>
