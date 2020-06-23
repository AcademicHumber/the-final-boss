<!–FORMULARIO PARA EL BACKEND–>
<?php
echo view("common/basicheader", ["titulo" => "FrontEnd"]);
?>
<h1>ESTO ES PARA LA VISTA DEL FRONTEND</h1>
<p> aqui se supone que vamos a poner todo: entradas, usuarios, ect xd</p>
<?php
echo "<br>";
echo anchor("UserController/index", "Cambia de usuario");
?>
<?php
echo view("common/basicfooter");
?>
