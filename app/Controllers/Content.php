<?php namespace App\Controllers;

use App\Models\ContentModel;

class Content extends BaseController{
    
    // esta instancia se utilizara en todo el controlador
    // se inicializa en el constructor
    protected  $instancia_del_modelo;
    
    function __construct() {
        helper('form'); 
        $this->instancia_del_modelo = new ContentModel();;
    }
            
    function crear(){
        $datos = [
            "id" => "",
            "titulo" => "",
            "encabezado" => "",
            "cuerpo" => ""
        ];
        $errors = [];
        $exito = ""; 
        $this->guardar($exito,$errors);
        return view("contenidos/crear", ["exito" => $exito,
                                         "errores" => $errors,
                                         "dato" => $datos]); 
    }
    
    function edit($id){        
        $errors = [];
        $exito = ""; 
        $this->guardar($exito,$errors);
        $datos = $this->instancia_del_modelo->find($id);
        return view("contenidos/editar", ["exito" => $exito,
                                          "errores" => $errors,
                                          "dato" => $datos]);
    }

    function articulo($id){
        // variable de usuario tipo admin hardcodeada
        // esta variable determina si aparecen opciones de edicion o no
        $creador = true;
        
        $articulo = $this->instancia_del_modelo->find($id);
        
        return view("contenidos/articulo", ["dato" => $articulo, "creador" => $creador]);
    }
    
    function articulos(){
        
        // Utilizamos la funcion listar para obtener todos los datos de la tabla        
        $lista_completa = $this->listar();
        
        return view("contenidos/mostrar", ["datos" => $lista_completa]);
    }
    
    
    
    protected function listar() {        
        $lista = $this->instancia_del_modelo->findAll();
        
        return $lista;
    }
    
    // Funcion que se encarga de guardar y actualizar con el metodo save del modelo
    //recibimos las 2 ultimas variables por referencia 
    
    public function guardar(&$exito, &$errors) {
              
        
        if ($this->request->getMethod() == "post"){
           // juntamos todo lo que viene en una sola variable
            $content = $_POST["cont"];            
           
           // Insertamos los datos a la BD, utilizando la funcion insert del modelo
           $guardar = $this->instancia_del_modelo->save($content);
           
           //Comprobamos el resultado
           if ($guardar){
               // Mesaje de éxito
               $exito = "Se guardo todo correctamente";
           }
           else{
               // Mesnaje de error
               $exito = "Hubieron errores al guardar";
               // Guardamos los errores que hubieron
               $errors = $this->instancia_del_modelo->errors();
           }
           
        }        
    }
    
    public function delete($id){
        $this->instancia_del_modelo->delete($id);
        
        // volvemos a la pantalla de articulos
        $lista_completa = $this->listar();
        
        return view("contenidos/mostrar", ["datos" => $lista_completa]);
    }
    
    public function images_dir(){
        return WRITEPATH.'uploads';
    }
    
    //Funcion que recibe las imagenes que se cargan al editor
    // Me tomo 3 días hacer esto :'v
    public function procesar_imagen(){  
        
        if ($img = $this->request->getFile("upload")){
         $newName = $img->getRandomName();
        // public/images
        $destination_dir = FCPATH."images";                   
        $img->move($destination_dir ,$newName);       
        // generar respuesta
        $repuesta = [
            "uploaded" => 1,
            "filename" => $newName,
            "url" => base_url("images/".$newName)
            ];
        }else{
          $repuesta = [
            "uploaded" => 0,           
            "error" => [
                "message" => "No se subio ningun archivo"
         ]];  
        }         
        return $this->response->setJSON($repuesta);        
    }    
    
    
}