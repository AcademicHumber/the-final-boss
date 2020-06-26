<!–FORMULARIO PARA EL BACKEND–>
<?php
echo view("common/basicheader", ["titulo" => "BACKEND"]);
print_r($_SESSION);
?>
<?php
echo "<br>";
echo anchor("UserController/login", "Cambia de usuario");

echo view("common/basicfooter");
?>
 
