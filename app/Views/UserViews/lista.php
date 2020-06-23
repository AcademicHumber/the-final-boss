<html>
    <head>
        <title>Lista de Usuarios</title>
    </head>
    <body>
        <h1>Lista de Usuarios</h1>
        <?php   
      echo anchor("UserController/Registro", "Registra un usuario");
       echo "<br>";?>
        <table border="1">
            <br>
            <tr>
                <th>Nombre de Usuario</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Perfil</th>
                <th></th>
            </tr>
            <?php
            foreach ($lista as $listar) {
                ?>
                <tbody>

                <td><?php echo $listar["nombre_usuario"] ?></td>
                <td><?php echo $listar["nombre"] ?></td>
                <td><?php echo $listar["apellido"] ?></td>
                <td><?php echo $listar["correo"] ?></td>
                <td><?php echo $listar["perfil"] ?></td>
                <td>
                    <?php echo anchor("UserController/editar?id=" . $listar["id"], "Editar"); ?>
                    -
                    <?php echo anchor("UserController/borrar/" . $listar["id"], "Borrar"); ?>
                </td>

            </tbody>
            <?php
        }
     
        ?>
    </table>


</body>
</html>

