<!–FORMULARIO PARA AÑADIR USUARIO–>

<html>
    <head>
        <title>Registro</title>
    </head>
    <body>
        <h2>Registro de Usuarios</h2>
        <?php
        echo form_open_multipart('');
        echo "<h2> $exito </h2>";
        echo anchor("UserController/loginFrontend", "¿Ya tienes una cuenta?");
        echo "<br>";
        ?>
        <!–Enlace para ir a la página de login–>

        <table>
            <tbody>
            <br>
            <tr>
                <td>Nombre de Usuario</td>
                <td><?php echo form_input("u[nombre_usuario]", "", ["required" => 1]);
                if (isset($errores["nombre_usuario"])) {
                    echo '<div>'.esc($errores["nombre_usuario"]).'</div>';
                }?></td>

            </tr>
            <tr>
                <td>Nombre</td>
                <td><?php echo form_input("u[nombre]", "", ["required" => 1]);
                if (isset($errores["nombre"])) {
                    echo '<div>'.esc($errores["nombre"]).'</div>';
                }?></td>
            </tr>
            <tr>
                <td>Apellido</td>
                <td><?php echo form_input("u[apellido]", "", ["required" => 1]);
                if (isset($errores["apellido"])) {
                    echo '<div>'.esc($errores["apellido"]).'</div>';
                }?></td>
            </tr>
            <tr>
                <td>Correo</td>
                <td><input type="email" name="u[correo]" required="">
                <?php
                    if (isset($errores["correo"])) {
                    echo '<div>'.esc($errores["correo"]).'</div>';
                }
                ?>
                </td>
            </tr>
            <tr>
                <td>Contraseña</td>
                <td><input type="password" name="u[contrasena]" required="">
                 <?php
                    if (isset($errores["contrasena"])) {
                    echo '<div>'.esc($errores["contrasena"]).'</div>';
                }
                ?>
                </td>
            </tr>
             <tr>
                <td>Confirmar Contraseña</td>
                <td><input type="password" name="u[contrasena_confir]" required="">
                 <?php
                    if (isset($errores["contrasena_confir"])) {
                    echo '<div>'.esc($errores["contrasena_confir"]).'</div>';
                }
                ?>
                </td>
            </tr>
            
            <tr>
                <td><input type="hidden" name="u[perfil]" value="suscriptor" ></td>

            </tr>
            <tr>
                <td> <?php echo form_submit("", "Crear Cuenta") ?></td>

            </tr>
        </tbody>
    </table>
    <?php
 
    echo "<br>";
    echo form_close();
    ?>
</body>
</html>

