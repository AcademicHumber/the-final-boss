<!–FORMULARIO PARA EL BACKEND–>
<?php
echo view("common/basicheader", ["titulo" => "BACKEND"]);
print_r($_SESSION);
?>
<h1>ESTO ES PARA LA VISTA DEL BACKEND</h1>
<p> aqui se supone que vamos a poner todo: entradas, usuarios, ect xd</p>
<?php
echo "<br>";
echo anchor("UserController/login", "Cambia de usuario");

echo view("common/basicfooter");
?>
 
