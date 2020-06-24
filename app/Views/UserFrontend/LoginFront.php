
<?php

echo view("common/adminlte/headerForm", ["titulo" => "Login"]);


echo form_open_multipart('UserController/index',["class" => "form-horizontal"]);
echo "<br>";
echo anchor("UserController/registrofrontend", "Registrate!");
   
echo view("common/adminlte/footerForm", ["titulo" => "Login"]);



?>
