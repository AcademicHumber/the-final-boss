<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Registro</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url('adminlte'); ?>/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url('adminlte'); ?>/dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <body class="login-page">

        <div class="login-box" style="width: 400px;">
            <!-- /.card -->             
            <div class="bg-light border-primary card">


<?php

echo form_open_multipart('UserController/registroFrontend',["class" => "form-horizontal"]);
?>
       
                <div class="card-body">                            
                   
                <div class="card-header border-primary bg-primary">                                          
                    <h3 class="text-center display-5">Registro</h3>                         
                </div>

                    <div class="form-group row-fluid">
                    <?php
                   if ($exito=="El usuario se registró correctamente") { ?>
                         <p class="alert alert-success alert-dismissable" >
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                              <?php
                                  echo $exito;
                             }
                             ?>
                          </p>
                      <?php 
                      if ($exito=="Hubo problemas para registrar al usuario"){
                          ?>
                            <p class="alert alert-danger alert-dismissable" >
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                              <?php
                                  echo "Hubo problemas para registrar";
                             }
                             ?>
                          </p>

                   </div>
                   <div class="input-group">
                       <label>Nombre de Usuario</label><br>                      
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control" name="u[nombre_usuario]" id="nombre_usuario" placeholder="Enter username" required="1" >
                       
                    </div>
                     <div class="input-group">
                            <?php
                         if (isset($errores["nombre_usuario"])) {
                         echo $errores["nombre_usuario"];
                         }?>                     
                    </div>
                      <div class="input-group">
                        <label>Nombre</label><br>                      
                    </div>
                    <div class="input-group">
                    <input type="text" class="form-control" name="u[nombre]" id="nombre" placeholder="Enter name" required="1" >
                        
                    </div>
                        <div class="input-group">
                           <?php
                        if (isset($errores["nombre"])) {
                          echo $errores["nombre"];
                      }?>                     
                    </div>
                            <div class="input-group">
                       <label>Apellido</label><br>                      
                    </div>
                    <div class="input-group">
                       <input type="text" class="form-control" name="u[apellido]" id="apellido" placeholder="Enter lastname" required="1" >
                        
                    </div>
                       <div class="input-group">
                           <?php
                        if (isset($errores["apellido"])) {
                          echo $errores["apellido"];
                      }?>                   
                    </div>
                            <div class="input-group">
                       <label>Correo electrónico</label><br>                      
                    </div>
                    <div class="input-group">
                        <input type="email" class="form-control" name="u[correo]" id="correo" placeholder="Enter email" required="1" value="<?php set_value('correo')?>" >
                         
                    </div>
                        <div class="input-group">
                          <?php
                        if (isset($errores["correo"])) {
                          echo $errores["correo"];
                      }?>                   
                    </div>
                            <div class="input-group">
                       <label>Contraseña</label><br>                      
                    </div>
                    <div class="input-group">
                         <input type="password" class="form-control" name="u[contrasena]" id="contrasena" placeholder="Enter password" required="1" >
                        
                    </div>
                       <div class="input-group">
                          <?php
                        if (isset($errores["contrasena"])) {
                          echo $errores["contrasena"];
                      }?>                  
                    </div>
                            <div class="input-group">
                       <label>Confirmar Contraseña</label><br>                      
                    </div>
                    <div class="input-group">
                          <input type="password" class="form-control" name="u[contrasena_confir] " id="contrasena_confir" placeholder="Confirm password" required="1">
        
                    </div>
                     <div class="input-group">         
                           <?php
                            if (isset($errores["contrasena_confir"])) {
                              echo $errores["contrasena_confir"];
                          }?>               
                    </div>
                        <input type="hidden" name="u[perfil]" value="suscriptor" >
                    <?php

                ?>
                 <div class="card-footer">
                     <div class="row">
                         <div class="col">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                    </div>
                </div>
                <?php
                        echo form_close();
                ?>
                </div> 
         </div>
        </div>  
 <!-- jQuery -->
        <script src="<?php echo base_url('adminlte'); ?>/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?php echo base_url('adminlte'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- bs-custom-file-input -->
        <script src="<?php echo base_url('adminlte'); ?>/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                bsCustomFileInput.init();
            });
        </script>
    </body>
</html>

                        
   


                    



