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
<body class="hold-transition sidebar-mini">
     
        <?php
            echo form_open_multipart('UserController/login');
           
        ?>

      <div class="container">
        <div class="row d-block">

            <!-- /.card -->
            <!-- Horizontal Form -->
            <div class="card card-info mx-auto border" style="width: 370px;">
              <div class="card-header ">
                <h3 class="card-title">Inicio de Sesión</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal">
                <div class="card-body">
                    <?php if($exito=="Usuario no válido"){ ?>
                   <p class="alert alert-danger text-white " style="text-align: center; ">
                     <?php
                       echo $exito;
                  }
                      ?>
                    
                   </p>
                  <div class="form-group row">
                  
                    <label for="inputEmail3" class="col-3 col-form-label " >Email</label>
                    <div class="col-9">
                      <input type="email" class="form-control" name="correo" required="" placeholder="Email">
                    </div>
                    <div>
                      <?php

                      if (isset($errores["correo"])) {
                          echo '<div>' . esc($errores["correo"]) . '</div>';
                      }
                      ?>
                      </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-3 col-form-label">Password</label>
                    <div class="col-9">
                      <input type="password" class="form-control" name="contrasena" required="" placeholder="Password">
                    </div>
                     <?php
                      if (isset($errores["contrasena"])) {
                          echo '<div>' . esc($errores["contrasena"]) . '</div>';
                      }
                      ?>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <div class="form-check form-danger">
                       <?php
                          echo "<br>";
                          echo anchor("UserController/recuperarContra", "¿Olvidaste tu contraseña?");
                          echo form_close();
                          ?>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Sign in</button>
                  <button type="submit" class="btn btn-default float-right">Cancel</button>
                </div>
          
              </form>
            </div>
   
          </div>

        </div>
           <?php
                echo form_close();
           ?>


<!-- jQuery -->
<script src="<?php echo base_url('adminlte'); ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('adminlte'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?php echo base_url('adminlte'); ?>/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('adminlte'); ?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('adminlte'); ?>/dist/js/demo.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
