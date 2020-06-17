<?php namespace App\Controllers;

use App\Models\ContentModel;

class Content extends BaseController{
    
    function crear(){
        helper('form');
        
        // Creamos una variable para almacenar los errores y otra para alamcenar el mensaje de éxito
        $errors = [];
        $exito = "";
        
        // Si se ejecuto el formulario, el servidor tendra un metodo Post y se ejecuta lo que esta dentro del if
        if ($this->request->getMethod() == "post"){
            echo "entra";
           // Creamos una instancia del modelo
           $instancia_modelo = new ContentModel();
           
           // Insertamos los datos a la BD, utilizando la funcion insert del modelo
           // Lo guardamos en una variable ($insertar) para comprobar si todo salio bien
           // Si todo salio bien, insertar es igual a 1, que significa true
           // Si hubo errores, insetar es igual a 0, que significa false
           $insertar = $instancia_modelo->insert($_POST["cont"]);
           
           //Comprobamos el resultado
           if ($insertar){
               // Mesaje de éxito
               $exito = "Se guardo todo correctamente";
           }
           else{
               // Mesnaje de error
               $exito = "Hubieron errores al guardar";
               // Guardamos los errores que hubieron
               $errors = $instancia_modelo->errors();
           }
           
        }
        
        // Ejecutamos la vista y mandamos las variables
        return view("contenidos/crear", ["exito" => $exito, "errores" => $errors]);
    }
    
    function mostrar(){
        $instancia_del_modelo = new ContentModel();
        // Utilizamos la funcion listar para obtener todos los datos de la tabla        
        $lista_completa = $this->listar($instancia_del_modelo);
        
        return view("contenidos/mostrar", ["datos" => $lista_completa]);
    }
    
    private function listar($instancia_del_modelo) {
        // Con una instancia del modelo, llamamos a la funcion find_all(), la cual nos
        // devolverá todos los datos en nuestra tabla, estos datos, tenemos que guardarlos en una variable
        $lista = $instancia_del_modelo->findAll();
        
        return $lista;
    }
    
}