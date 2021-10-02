<!DOCTYPE html>
<html>
    <head>
        <title>PHP MySQL SP Test con parametros</title>
        <link rel="stylesheet" href="css/table.css" type="text/css" />
    </head>
    <body>
        <?php
        require_once 'dbconfig.php';
        try {
            $statement="";
            $nombreusuario = '1';
            $usuarios = [];
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);  

            $sql  = 'CALL sp_usuarios_getxid(:id)';

            $statement = $pdo->prepare($sql);
            $statement->bindParam(':id', $nombreusuario,  PDO::PARAM_INT); 
            $statement->execute(); 
            $usuarios = $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error occurred:" . $e->getMessage());
        }
        ?>
     <table>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Tipo Usuario</th>
            </tr>
            <?php foreach ($usuarios as $r) {?>
                <tr>
                    <td><?php echo $r['idusuario'] ?></td>
                    <td><?php echo $r['nombre'] ?></td>
                    <td><?php echo $r['apellido'] ?></td>
                    <td><?php echo $r['tipo'] ?></td>
                    </td>
                </tr>
            <?php }; ?>
        </table>
</html>    