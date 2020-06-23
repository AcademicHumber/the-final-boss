<!–FORMULARIO PARA CONFIRMAR CONTRASEÑA –>

<?php
echo view("common/basicheader", ["titulo" => "Confirmar Contraseña"]);
?>
<form action="" method="POST">
    <h2>Recuperar contraseña</h2>

    <!–--Enlace para ir a la página de registro–>
    <a href="loginFrontend">Inicia sesión</a><br>
    <?php
    echo "<br>";

    //echo "<h2> $exito </h2>";
    ?>
    <table >
        <tbody>
            <tr>
                <td>Contrasena</td>
                <td><input type="password" name="contrasena" required="">
                    <?php
                    echo "<br>";
                    /* if (isset($errores["correo"])) {
                      echo '<div>' . esc($errores["correo"]) . '</div>';
                      } */
                    ?>
                </td>

            </tr>
            <tr>
                <td>Confirmar Contraseña</td>
                <td><input type="password" name="contrasena_confir" required="">
                    <?php
                    echo "<br>";
                    /* if (isset($errores["correo"])) {
                      echo '<div>' . esc($errores["correo"]) . '</div>';
                      } */
                    ?>
                </td>
                <td> <input type="submit" value="Cambiar Contraseña"></td>

            </tr>

        </tbody>
    </table>
    <?php
    echo "<br>";
    ?>
</form>
<?php
echo view("common/basicfooter");
?>