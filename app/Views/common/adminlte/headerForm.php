<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $titulo; ?></title>
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

        <div class="login-box">
            <!-- /.card -->             
            <div class="bg-light border-primary card">

                <div class="card-header border-primary bg-primary">                                          
                    <h3 class="text-center display-5">Inicio de Sesión</h3>                         
                </div>
                <!-- Form Start-->
                <?php
                echo form_open_multipart('UserController/login',
                        ["class" => "form-horizontal"]);
                ?>
                
                <div class="card-body">                            

                    <div class="form-group row">
                    <!-- /.card-header -->


                    <?php if ($exito == "Usuario no válido") { ?>
                        <p class=" alert alert-danger text-white " style="text-align: center; ">
                            <?php
                            echo $exito;
                        }
                        ?>

                    </p>

                   </div>
                   <div class="input-group mb-3">
                       <input type="email" class="form-control" name="correo" required="" placeholder="Email">                        
                       <div class="input-group-append">
                           <div class="input-group-text">
                               <span class="fas fa-envelope"></span>
                           </div> 
                       </div>                      
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="contrasena" required="" placeholder="Password">                        
                       <div class="input-group-append">
                           <div class="input-group-text">
                               <span class="fas fa-lock"></span>
                           </div> 
                       </div>                                               
                    </div>
                    <div class="row">
                        <div class="col-sm-10">                           
                                <?php
                                echo "<br>";
                                echo anchor("UserController/recuperarContra", "¿Olvidaste tu contraseña?");
                                ?>                           
                        </div>
                    </div>
                </div>
                 <div class="card-footer">
                     <div class="row">
                         <div class="col">
                            <button type="submit" class="btn btn-info">Sign in</button>
                        </div>
                    </div>
                </div>
                <?php
                        echo form_close();
                ?>
               
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
