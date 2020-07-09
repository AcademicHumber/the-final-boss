<!–FORMULARIO DE LOGIN, USUARIOS YA REGISTRADOS PREVIAMENTE –>
<?php
echo view("common/adminlte/headerForm", ["titulo" => "Login"]);
helper("form");

echo form_open_multipart('UserController/login',
                        ["class" => "form-horizontal"]);
   
echo view("common/adminlte/footerForm", ["titulo" => "Login"]);

?>


