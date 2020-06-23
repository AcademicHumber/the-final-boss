<!–FORMULARIO PARA RECUPERAR CONTRASEÑA –>

<?php
echo view("common/basicheader", ["titulo" => "Recuperar Contraseña"]);
?>
<form action="ConfirmarContra" method="POST">
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
                <td>Correo</td>
                <td><input type="email" name="correo" required="">
                    <?php
                    echo "<br>";
                    /* if (isset($errores["correo"])) {
                      echo '<div>' . esc($errores["correo"]) . '</div>';
                      } */
                    ?>
                </td>
                <td> <input type="submit" value="Enviar correo"></td>

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
