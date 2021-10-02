<!DOCTYPE html>
<html>
    <head>
        <title>PHP MySQL SP Test</title>
        <link rel="stylesheet" href="css/table.css" type="text/css" />
    </head>
    <body>
        <?php
        require_once 'dbconfig.php';
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            // execute the stored procedure
            $sql = 'CALL sp_usuarios_Get()';
            // call the stored procedure
            $q = $pdo->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);
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
            <?php while ($r = $q->fetch()): ?>
                <tr>
                    <td><?php echo $r['idusuario'] ?></td>
                    <td><?php echo $r['nombre'] ?></td>
                    <td><?php echo $r['apellido'] ?></td>
                    <td><?php echo $r['tipo'] ?></td>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </body>
</html>    