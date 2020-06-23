<!–FORMULARIO PARA EDITAR USUARIO–>

<html>
    <head>
        <title>Editar Usuario</title>
    </head>
    <body>

        <h2>Editar Usuario</h2>
        <?php
        echo form_open_multipart('');
        echo "<h2> $exito </h2>";
        ?>

        <table>
            <tbody>
            <br>
            <tr>
                <td>Nombre de Usuario</td>
                <td><?php echo form_input("user[nombre_usuario]", $modificar["nombre_usuario"], ["required" => 1]); 
                     if (isset($errores["nombre_usuario"])) {
                    echo '<div>'.esc($errores["nombre_usuario"]).'</div>';
                }
                ?></td>

            </tr>
            <tr>
                <td>Nombre</td>
                <td><?php echo form_input("user[nombre]", $modificar["nombre"], ["required" => 1]);
                if (isset($errores["nombre"])) {
                    echo '<div>'.esc($errores["nombre"]).'</div>';
                }?></td>
            </tr>
            <tr>
                <td>Apellido</td>
                <td><?php echo form_input("user[apellido]", $modificar["apellido"], ["required" => 1]);
                if (isset($errores["apellido"])) {
                    echo '<div>'.esc($errores["apellido"]).'</div>';
                }?></td>
            </tr>
            <tr>
                <td>Correo</td>
                <td><input type="email" name="user[correo]" value="<?php echo $modificar["correo"] ?>" required="">
                <?php if (isset($errores["correo"])) {
                    echo '<div>'.esc($errores["correo"]).'</div>';
                }
                ?>
                </td>
            </tr>


            <tr>
                <td>Perfil</td>
                <td><?php
        echo form_dropdown("user[perfil]", [
            "administrador" => "Administrador",
            "editor" => "Editor",
            "autor" => "Autor",
            "contribuidor" => "Contribuidor",
            "suscriptor" => "Suscriptor"
            ], $modificar["perfil"], ["required" => 1]);
        ?>
                </td>

            </tr>
            <tr>
                <td> <?php echo form_submit("UserController/editar", "Editar Datos") ?></td>
            </tr>
        </tbody>
    </table>
    <?php
    echo form_close();
    echo anchor("UserController/listar", "Volver a las listas");
    ?>
</body>
</html>


