<!DOCTYPE html>
<html>
    <head>
        <title>PHP MySQL SQL Test</title>
        <link rel="stylesheet" href="css/table.css" type="text/css" />
    </head>
    <body>
        <?php
        require_once 'dbconfig.php';
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $stmt = $pdo->prepare("SELECT usuario.idUsuario,usuario.Nombre,usuario.Apellido, tipousuario.Tipo FROM usuario inner join tipousuario on usuario.TipoUsuario_idTipoUsuario = tipousuario.idtipousuario");
            $stmt->execute();

        } catch (PDOException $e) {
            die("Este es el Error occurred:" . $e->getMessage());
        }
        ?>
        <table>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Tipo Usuario</th>
            </tr>
            <?php while ($r = $stmt->fetch(PDO::FETCH_OBJ)): ?>
                <tr>
                    <td><?php echo $r->idUsuario ?></td>
                    <td><?php echo $r->Nombre ?></td>
                    <td><?php echo $r->Apellido ?></td>
                    <td><?php echo $r->Tipo ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </body>
</html> 