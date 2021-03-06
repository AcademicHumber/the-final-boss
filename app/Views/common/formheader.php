<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Proyecto</title>

  
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- include libraries for the editor -->        
   <script src="<?php echo base_url('ckeditor/ckeditor.js') ?>"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('adminlte'); ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('adminlte'); ?>/https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('adminlte'); ?>/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="<?php echo base_url('adminlte'); ?>/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item d-none d-sm-inline-block nav-link bg-white btn-outline-dark">
          <?php echo anchor("", "Ir al Blog"); ?>
      </li>     
      <li class="nav-item d-none d-sm-inline-block nav-link bg-white">
          <div class="dropdown">         
       
          </div>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- User logout -->
      <li class="nav-item dropdown">
         
          <a class="nav-link" data-toggle="dropdown" href="<?php echo base_url("UserController/login");?>">
           <img src="<?php echo base_url('adminlte'); ?>/dist/img/user.png" class="img-circle elevation-2" alt="User Image" style="width: 20px; height: 20px;">
        Logout
        </a> 
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <span class="brand-text font-weight-light">CMS in CodeIgniter</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex" >
        <div class="row">
        <div class="info d-block text-white">
          <div class="image">
          <img src="<?php echo base_url('adminlte'); ?>/dist/img/user.png" class="img-circle elevation-2" alt="User Image" style="width: 35px; height: 35px;">
          </div>
        </div>
        <div class="info d-block text-white">
          <?php print_r($_SESSION["nombre"]);
          echo "<br>";
          print_r($_SESSION["perfil"]);?>
        </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- ARTICULOS-->
          <li class="nav-item has-treeview">
           <a href="" class="nav-link">
              <i class="nav-icon fas "><img src="<?php echo base_url('adminlte'); ?>/dist/img/user.png" class="img-circle elevation-1" alt="User Image" style="width: 20px; height: 20px;"></i>
              <p>
                Artículos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <div class="nav-link">
                <?php echo anchor("content/verarticulos","Todos los artículos"); ?>
               </div>
              </li>
            <li class="nav-item">
                <div class="nav-link">
                <?php echo anchor("content/crearArticulo","Añadir Articulo"); ?>
               </div>
              </li>
            </ul>
          </li>
          <!-- CATEGORIAS-->
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas "><img src="<?php echo base_url('adminlte'); ?>/dist/img/user.png" class="img-circle elevation-1" alt="User Image" style="width: 20px; height: 20px;"></i>
              <p>
                Categorías
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <div class="nav-link">
                <?php echo anchor("content/vercategorias","Todas las categorías"); ?>
               </div>
              </li>
            <li class="nav-item">
                <div class="nav-link">
                <?php echo anchor("content/crearCategoria","Añadir categoría"); ?>
               </div>
              </li>
            </ul>
          </li>
            <!-- PAGINAS-->
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas "><img src="<?php echo base_url('adminlte'); ?>/dist/img/user.png" class="img-circle elevation-1" alt="User Image" style="width: 20px; height: 20px;"></i>
              <p>
                Páginas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <div class="nav-link">
                <?php echo anchor("content/verpaginas","Todas las páginas"); ?>
               </div>
              </li>
            <li class="nav-item">
                <div class="nav-link">
                <?php echo anchor("content/crearPagina","Añadir página"); ?>
               </div>
              </li>
            </ul>
          </li>
            <!--COMENTARIOS-->
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas "><img src="<?php echo base_url('adminlte'); ?>/dist/img/user.png" class="img-circle elevation-1" alt="User Image" style="width: 20px; height: 20px;"></i>
              <p>
                Comentarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <div class="nav-link">
                <?php echo anchor("content/vercomentarios","Todos los comentarios"); ?>
               </div>
              </li>
            </ul>
          </li>
            <!--IMAGENES-->
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
           <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-images" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M12.002 4h-10a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1zm-10-1a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-10z"/>
  <path d="M10.648 8.646a.5.5 0 0 1 .577-.093l1.777 1.947V14h-12v-1l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71z"/>
  <path fill-rule="evenodd" d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM4 2h10a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1v1a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2h1a1 1 0 0 1 1-1z"/>
</svg>
              <p>
                Imagenes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <div class="nav-link">
                <?php echo anchor("content/admin_imgs","Ver Imagenes de la página"); ?>
               </div>
              </li>
            </ul>
          </li>
            <!--USUARIOS-->
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas "><img src="<?php echo base_url('adminlte'); ?>/dist/img/user.png" class="img-circle elevation-1" alt="User Image" style="width: 20px; height: 20px;"></i>
              <p>
                Usuarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <div class="nav-link">
                <?php echo anchor("UserController/listar","Todos los Usuarios"); ?>
               </div>
              </li>
            <li class="nav-item">
                <div class="nav-link">
                <?php echo anchor("usercontroller/Registro","Añadir Usuario"); ?>
               </div>
              </li>
            </ul>
          </li>
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">