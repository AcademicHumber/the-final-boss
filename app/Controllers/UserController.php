<?php

namespace App\Controllers;

class UserController extends BaseController {

    //metodo para ingresar un usuario previamente registrado
    public function login() {
        helper("form");
        //Variables donde se cargaran los errores si es que hubiesen y exito
        $errores = [];
        $exito = "";
        $usuario = [
           "id" => "",
           "username" => "",
           "nombre" => "",
           "correo" => "",
           "perfil" => ""
         ];
        $this->session->set($usuario);
        
        //si el método es post
        if ($this->request->getMethod() == "post") {            
            
            //se llama al metodo correo(devuelve un correo) y se le pasa el argumento del correo, de post
            $correo = $this->instancia_usuarios->correo($_POST["correo"]);

            //si el correo no existe en la bd, mandara un mensaje de error
            if (!$correo) {
                $exito = "Usuario no válido";
            }
            else{
            
            //como el metodo correo devuelve un array con todos los campos del usuario en base al correo que se manda,
            //se obtiene asi la contraseña encriptada para luego compararla con el password_verify
            $contraseña = $correo['contrasena'];


            //si la contraseña ingresa por el usuario coincide con la contraseña del mismo en la bd
            if (password_verify($_POST['contrasena'], $contraseña) && $correo["perfil"] != "suscriptor") {
                //iniciamos la sesion del usuario
                $usuario = [
                    "id" => $correo["id"],
                    "username" => $correo["nombre_usuario"],
                    "nombre" => $correo["nombre"],
                    "correo" => $correo["correo"],
                    "perfil" => $correo["perfil"]
                ];
                $this->session->set($usuario);
                
                //se redirecciona al backend                
                return redirect()->to('backend');
            } else {
                //sino se manda un mensaje de usuario no valido y los errores
                $exito = "Usuario no válido";
                $errores = $this->instancia_usuarios->errors();
            }
        }
        }
        //se llama a la vista de login y se le pasa las variables de exito y error para las validaciones
        echo view('UserViews/login', ["exito" => $exito, "errores" => $errores]);
    }

    //metodo donde se redirecciona si el usuario ingresado en el login es válido
    public function backend() {  
        return redirect()->to(site_url("content"));
       // echo view('common/adminlte/main');
    }

    //metodo para registrar un nuevo usuario
    public function registro() {

        helper("form");
        //Variables donde se cargaran los errores si es que hubiesen y exito
        $errores = [];
        $exito = "";
       
        $listarPage = $this->instancia_paginas->findAll();

        //si el metodo es post
        if ($this->request->getMethod() == "post") {            
     
            //guardamos todo lo de post en la variable datos
            $datos = $_POST["user"];

            //si la contraseña y el confirmar contraseñas son iguales(ojo_sin_encriptar)
            if ($datos["contrasena"] == $datos["contrasena_confir"]) {
                //si son iguales, hasheamos la contraseña
                $datos["contrasena"] = password_hash($datos["contrasena"], PASSWORD_DEFAULT);

                //le asignamos a contrasena_confir el valor hasheado de contraseña para que puede ingresar a la bd
                $datos["contrasena_confir"] = $datos["contrasena"];

                //se inserta a la bd de datos todo lo que hay en la variable datos
                $insertar = $this->instancia_usuarios->insert($datos);
               
                
                //confirmar si se inserto correctamente el usuario
                if ($insertar){
                    //mandamos el mensaje de confirmación
                    $exito = "El usuario se registró correctamente"; 

                }
                else{
                   //Mandamos mensaje de error, seguramente fallo una validacion
                    $exito = "Hubo problemas para registrar al usuario";
                    $errores = $this->instancia_usuarios->errors(); 
                }                   
            
            } else {
                $exito = "Hubo problemas para registrar al usuario";
                $errores = $this->instancia_usuarios->errors();
            }
        }
        
        //se ejecuta la vista y se adicionan tambien las variables de exito y errores con lo que contengan
        echo view('UserViews/Registro', ["exito" => $exito, "errores" => $errores, "paginas"=>$listarPage]);
    }

    public function listar() {        
        //con la funcion findAll obtenemos todos los datos de la bd y se la asigna a una variable
        $listar = $this->instancia_usuarios->findAll();
        $listarPage = $this->instancia_paginas->findAll();

        //se llama a la vista y se pasan todos los datos en la variable LISTA
        echo view('UserViews/lista', ["lista" => $listar, "paginas"=>$listarPage]);
       
    }

    public function editar() {     
        
        //se crea las variables para almacenar el éxito y los errores
        $errores = [];
        $exito = "";
        
        //Si el método es post
        if ($this->request->getMethod() == "post") {
            //se guarda todo lo que se recibe de post en la varible datos
            $datos = $_POST["user"];           

            //Se hace el update, pasandole el id y lo que hay dentro de usuario que anteriormente se guardó todo lo que vino de post
            $modificar = $this->instancia_usuarios->update($_GET["id"],$datos);

            //se hacen las validaciones
            if ($modificar) {
                $exito = "El usuario se modificó correctamente";
            } else {
                $exito = "Hubo problemas para modificar al usuario";
                $errores = $this->instancia_usuarios->errors();
            }
        }
        
        //se llama al método idUsuario pasando el argumento ID obtenido del get
        $usuario = $this->instancia_usuarios->idUsuario($_GET["id"]);

        //Si el id no existe en la base de datos, se redirecciona la misma página
        //(Luego agregar mensaje de no se encontró el usuario_ OJO)
        if (empty($usuario)) {
            return redirect()->to(site_url("UserController/listar"));
        }
        helper("form");
        //cargar paginas para la vista
         $listarPage = $this->instancia_paginas->findAll();
        //se manda a la vista las variables de exito y error y la variable usuairo, que va a estar almacenado en la variable $modificar 
        echo view('UserViews/editar', ["modificar" => $usuario, "exito" => $exito, "errores" => $errores, "paginas" => $listarPage]);
    }

    public function borrar($id) {       

        //se obtiene el metodo borrar del usuario model y se redirecciona este o no este el id de usuario
        //(Luego agregar mensaje de no se encontró el usuario_ OJO)
        if ($this->instancia_usuarios->borrar($id)) {
            return redirect()->to(site_url('UserController/listar'));
        } else {

            return redirect()->to(site_url('UserController/listar'));
        }
    }

    //metodo para ingresar un usuario previamente registrado
    public function index() {

        helper("form");
        //Variables donde se cargaran los errores si es que hubiesen y exito
        $errores = [];
        $exito = "";
        //Limpiar la variable sessions
        $usuario = [
            "id" => "",
            "username" => "",
            "nombre" => "",
            "correo" => "",
            "perfil" => ""
         ];
         $this->session->set($usuario);

        //si el método es post
        if ($this->request->getMethod() == "post") {            
            //se llama al metodo correo(devuelve un correo) y se le pasa el argumento del correo, de post
            $correo = $this->instancia_usuarios->correo($_POST["correo"]);

            //si el correo no existe en la bd, mandara un mensaje de error
            if (!$correo) {
                $exito = "Usuario no válido";
            }

            else{
            
            //como el metodo correo devuelve un array con todos los campos del usuario en base al correo que se manda,
            //se obtiene asi la contraseña encriptada para luego compararla con el password_verify
            $contraseña = $correo['contrasena'];

            //si la contraseña ingresa por el usuario coincide con la contraseña del mismo en la bd
            if (password_verify($_POST['contrasena'], $contraseña)) {
                //Cargar usuario a la variable sessions
                $usuario = [
                    "id" => $correo["id"],
                    "username" => $correo["nombre_usuario"],
                    "nombre" => $correo["nombre"],
                    "correo" => $correo["correo"],
                    "perfil" => $correo["perfil"]
                ];
                $this->session->set($usuario);
                //se redirecciona al frontend
                return redirect()->to('frontend');
            } else {
                //sino se manda un mensaje de usuario no valido y los errores
                $exito = "Usuario no válido";
                $errores = $this->instancia_usuarios->errors();
            }

           }
            
        }

        //se llama a la vista de login y se le pasa las variables de exito y error para las validaciones
        echo view('UserFrontend/loginFront', ["exito" => $exito, "errores" => $errores]);
    }

    //metodo donde se redirecciona si el usuario ingresado en el login es válido
    public function frontend() {
        //cargar paginas para la vista
        //$paginas = $this->listar($this->instancia_paginas);
        //solo devuelve la vista del frontend
        return view('UserFrontend/frontend');
    }

    //metodo para registrar un nuevo usuario
    public function registroFrontend() {
        helper("form");
        //Variables donde se cargaran los errores si es que hubiesen y exito
        $errores = [];
        $exito = "";

        //si el metodo es post
        if ($this->request->getMethod() == "post") {           
            //guardamos todo lo de post en la variable datos
            $datos = $_POST["u"];

            //si la contraseña y el confirmar contraseñas son iguales(ojo_sin_encriptar)
            if ($datos["contrasena"] == $datos["contrasena_confir"]) {
                //si son iguales, hasheamos la contraseña
                $datos["contrasena"] = password_hash($datos["contrasena"], PASSWORD_DEFAULT);

                //le asignamos a contrasena_confir el valor hasheado de contraseña para que puede ingresar a la bd
                $datos["contrasena_confir"] = $datos["contrasena"];

                //se inserta a la bd de datos todo lo que hay en la variable datos
                $insertar = $this->instancia_usuarios->insert($datos);

                //confirmar si se inserto correctamente el usuario
                if ($insertar){
                    //mandamos el mensaje de confirmación
                    $exito = "El usuario se registró correctamente";
                    //lo redireccionamos al frontend
                    return view('UserFrontend/loginFront', ["exito" => $exito]);
                }
                else{
                   //Mandamos mensaje de error, seguramente fallo una validacion
                    $exito = "Hubo problemas para registrar al usuario";
                    $errores = $this->instancia_usuarios->errors(); 
                }
                
            } else {
                $exito = "Hubo problemas para registrar al usuario";
                $errores = $this->instancia_usuarios->errors();
            }
        }
        //cargar paginas para la vista
         $listarPage = $this->instancia_paginas->findAll();
        //se ejecuta la vista y se adicionan tambien las variables de exito y errores con lo que contengan
        return view('UserFrontend/RegistroFront', ["exito" => $exito, "errores" => $errores, "paginas" => $listarPage]);
    }

    public function recuperarContra() {
        echo view('UserFrontend/RecupContra');
    }

    public function ConfirmarContra() {
        echo view('UserFrontend/ConfirContra');
    }

}
