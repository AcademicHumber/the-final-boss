<!–FORMULARIO DE LOGIN, USUARIOS YA REGISTRADOS PREVIAMENTE –>

<html>
    <head>
        <title>Login</title>
    </head>
    <body>

        <h2>Ingreso</h2>

        <!–Enlace para ir a la página de registro–>
        <a href="registroFrontend">Registrate</a><br>
        <?php
        echo form_open('UserController/loginFrontend');
        echo "<h2> $exito </h2>";
        ?>
        <table >
            <tbody>
                <tr>
                    <td>Correo</td>
                    <td><input type="email" name="correo" required="">
                        <?php
                        if (isset($errores["correo"])) {
                            echo '<div>' . esc($errores["correo"]) . '</div>';
                        }
                        ?>
                    </td>
                    <td> <input type="submit" value="Ingresar"></td>

                </tr>
                <tr>
                    <td>Contraseña</td>
                    <td><input type="password" name="contrasena" required="">
                        <?php
                        if (isset($errores["contrasena"])) {
                            echo '<div>' . esc($errores["contrasena"]) . '</div>';
                        }
                        ?>
                    </td>
                </tr>

            </tbody>
        </table>
        <?php
          echo "<br>";
        echo anchor("UserController/recuperarContra", "¿Olvidaste tu contraseña?");
      
        echo form_close();
        ?>
    </body>
</html>

