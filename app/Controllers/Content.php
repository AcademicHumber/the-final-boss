<?php namespace App\Controllers;

use App\Models\ContentModel;
use App\Models\PagesModel;

class Content extends BaseController{
    
    /*------------------ SECCION UTILITARIOS---------------------------*/
    
    // estas instancias se utilizara en todo el controlador
    // se inicializan en el constructor
    protected  $instancia_articulos;
    protected  $instancia_paginas;
    
    function __construct() {
        helper('form'); 
        $this->instancia_articulos = new ContentModel();
        $this->instancia_paginas = new PagesModel();
    }
    
    public function index(){
      $articulos = $this->listar($this->instancia_articulos);        
      $paginas = $this->listar($this->instancia_paginas);        
      return view("contenidos/showArticles", ["datos" => $articulos, "paginas" => $paginas]);  
    }
        
    protected function listar($instancia) {        
        $lista = $instancia->findAll();
        
        return $lista;
    }
    
    // Funcion que se encarga de guardar y actualizar con el metodo save del modelo
    //recibimos las 2 ultimas variables por referencia 
    
    public function guardar($instancia, &$exito, &$errors) {              
        
        if ($this->request->getMethod() == "post"){
           // juntamos todo lo que viene en una sola variable
            $content = $_POST["cont"];            
           
           // Insertamos los datos a la BD, utilizando la funcion insert del modelo
           $guardar = $instancia->save($content);
           
           //Comprobamos el resultado
           if ($guardar){
               // Mesaje de éxito
               $exito = "Se guardo todo correctamente";
           }
           else{
               // Mesnaje de error
               $exito = "Hubieron errores al guardar";
               // Guardamos los errores que hubieron
               $errors = $instancia->errors();
           }
           
        }        
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
    
    /*--------------------SECCION ARTICULOS-----------------*/ 
    
    function crearArticulo(){
        $datos = [
            "id" => "",
            "titulo" => "",
            "encabezado" => "",
            "cuerpo" => ""
        ];
        $errors = [];
        $exito = ""; 
        $this->guardar($this->instancia_articulos, $exito, $errors);
        return view("contenidos/createArticle", ["exito" => $exito,
                                         "errores" => $errors,
                                         "dato" => $datos]); 
    }
    
    function editArticulo($id){        
        $errors = [];
        $exito = ""; 
        $this->guardar($this->instancia_articulos, $exito, $errors);
        //Cargar el articulo actualizado o a actualizar
        $datos = $this->instancia_articulos->find($id);
        echo $datos;
        return view("contenidos/editArticle", ["exito" => $exito,
                                          "errores" => $errors,
                                          "dato" => $datos]);
    }

    function articulo($id){
        // variable de usuario tipo admin hardcodeada
        // esta variable determina si aparecen opciones de edicion o no
        $creador = true;
        
        $articulo = $this->instancia_articulos->find($id);
        
        return view("contenidos/article", ["dato" => $articulo, "creador" => $creador]);
    }
    
    function articulos(){
        
        // Utilizamos la funcion listar para obtener todos los datos de la tabla        
        $articulos = $this->listar($this->instancia_articulos);
        
        $paginas = $this->listar($this->instancia_paginas);
        
        return view("contenidos/showArticles", ["datos" => $articulos, "paginas" => $paginas]);
    }
    function verarticulos(){
        
        // Utilizamos la funcion listar para obtener todos los datos de la tabla        
        $articulos = $this->listar($this->instancia_articulos);
        
        return view("contenidos/showListOfArticles", ["datos" => $articulos]);
    }
    
    public function deleteArticle($id){
        $this->instancia_articulos->delete($id);
        
        // volvemos a la pantalla de articulos
        $lista_completa = $this->listar();
        
        return view("contenidos/showListOfArticles", ["datos" => $lista_completa]);
    }
    
    
    /*----------------FIN SECCION ARTICULOS----------------------------*/
    
    /*--------------------- SECCION PÄGINAS--------------------------*/
    
    function crearPagina(){
        $datos = [
            "id" => "",
            "titulo" => "",
            "encabezado" => "",
            "cuerpo" => ""
        ];
        $errors = [];
        $exito = ""; 
        $this->guardar($this->instancia_paginas,$exito,$errors);
        return view("contenidos/createPage", ["exito" => $exito,
                                         "errores" => $errors,
                                         "dato" => $datos]); 
    }
    
    function editPagina($id){        
        $errors = [];
        $exito = ""; 
        $this->guardar($this->instancia_paginas, $exito, $errors);
        //Cargar la pagina actualizada o a actualizar
        $datos = $this->instancia_paginas->find($id);  
        
        return view("contenidos/editPage", ["exito" => $exito,
                                          "errores" => $errors,
                                           "dato" => $datos]);
      
        
        
    }
    function pagina($id){
        // variable de usuario tipo admin hardcodeada
        // esta variable determina si aparecen opciones de edicion o no
        $creador = true;
        
        $pagina = $this->instancia_paginas->find($id);
        
        return view("contenidos/page", ["dato" => $pagina, "creador" => $creador]);
    }    
    public function deletePage($id){
        $this->instancia_paginas->delete($id);
        
        // volvemos a la pantalla de articulos
        $lista_completa = $this->listar($this->instancia_paginas);
        
        return view("contenidos/showListOfPages", ["datos" => $lista_completa]);
    }
    function verpaginas(){
        
        // Utilizamos la funcion listar para obtener todos los datos de la tabla        
        $articulos = $this->listar($this->instancia_paginas);
        
        return view("contenidos/showListOfPages", ["datos" => $articulos]);
    }
    
    
    /*---------------------FIN SECCION PÁGINAS--------------------------*/
    
        

}