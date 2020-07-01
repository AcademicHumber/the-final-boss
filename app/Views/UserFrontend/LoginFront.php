
<?php

echo view("common/adminlte/headerForm", ["titulo" => "Login"]);


echo form_open_multipart('UserController/ingresar',["class" => "form-horizontal"]);
echo anchor("UserController/registrofrontend", "Registrate!", ["class" => "btn btn-primary ml-3 mt-4"]);
echo anchor("", "ir a la pantalla principal", ["class" => "btn btn-secondary ml-3 mt-4"]);
   
echo view("common/adminlte/footerForm", ["titulo" => "Login"]);



?>
