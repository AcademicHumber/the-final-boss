<?php namespace App\Controllers;

use App\Models\ContentModel;
use App\Models\PagesModel;
use App\Models\CommentsModel;
use App\Models\CategoriesModel;

class Content extends BaseController{
    
    /*------------------ SECCIÓN UTILITARIOS---------------------------*/
    
    // estas instancias se utilizara en todo el controlador
    // se inicializan en el constructor
    protected  $instancia_articulos;
    protected  $instancia_paginas;
    protected  $instancia_comentarios;
    protected  $instancia_categorias;
    
    function __construct() {
        helper('form'); 
        $this->instancia_articulos = new ContentModel();
        $this->instancia_paginas = new PagesModel();
        $this->instancia_comentarios = new CommentsModel();
        $this->instancia_categorias = new CategoriesModel();
    }
    
    public function index(){
      $articulos = $this->listar($this->instancia_articulos);        
      $paginas = $this->listar($this->instancia_paginas);        
      return view("contenidos/articulos/showArticles", ["datos" => $articulos, "paginas" => $paginas]);  
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
    
    /*--------------------SECCIÓN ARTICULOS-----------------*/ 
    
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
        $categorias = $this->listar($this->instancia_categorias);        
        return view("contenidos/articulos/createArticle", ["exito" => $exito,
                                         "errores" => $errors,
                                         "dato" => $datos,
                                         "categorias" => $categorias]); 
    }
    
    function editArticulo($id){        
        $errors = [];
        $exito = ""; 
        $this->guardar($this->instancia_articulos, $exito, $errors);
        //Cargar el articulo actualizado o a actualizar
        $datos = $this->instancia_articulos->find($id);
        //Si el id no existe $datos=NULL, entonces se redirige 
        if(is_null($datos)){
            return redirect()->to(site_url("content/verarticulos"));
        }
        $categorias = $this->listar($this->instancia_categorias);        
        return view("contenidos/articulos/editArticle", ["exito" => $exito,
                                         "errores" => $errors,
                                         "dato" => $datos,
                                         "categorias" => $categorias]); 
    }
    function articulo($id){
        //Procesar comentarios nuevos
        $exito = "";
        $errors = "";
        $this->guardar($this->instancia_comentarios, $exito, $errors); 
        
        //cargar articulo
        $articulo = $this->instancia_articulos->find($id);
        if(is_null($articulo)){
            return redirect()->to(site_url("content/verarticulos"));
        }
        //cargar categorias
        $categorias = $this->listar($this->instancia_categorias); 
        //cargar comentarios para el articulo
        $comentarios = $this->instancia_comentarios->comentarios_del_articulo($id);
              
        return view("contenidos/articulos/article", ["dato" => $articulo, "comentarios" => $comentarios, "categorias" => $categorias]);
    }
    function verarticulos(){
        
        // Utilizamos la funcion listar para obtener todos los datos de la tabla        
        $articulos = $this->listar($this->instancia_articulos);
        
        return view("contenidos/articulos/showListOfArticles", ["datos" => $articulos]);
    }
    
    public function deleteArticle($id){
       $this->instancia_articulos->delete($id);       
       return redirect()->to(site_url("content/verarticulos"));
    }
    
    
    /*----------------FIN SECCIÓN ARTICULOS--------------------------*/
    
    /*--------------------- SECCIÓN PÄGINAS--------------------------*/
    
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
        return view("contenidos/paginas/createPage", ["exito" => $exito,
                                         "errores" => $errors,
                                         "dato" => $datos]); 
    }    
    function editPagina($id){        
        $errors = [];
        $exito = ""; 
        $this->guardar($this->instancia_paginas, $exito, $errors);
        //Cargar la pagina actualizada o a actualizar
        $datos = $this->instancia_paginas->find($id);  
        if (is_null($datos)) return redirect ()->to (site_url ("content/verpaginas"));
        return view("contenidos/paginas/editPage", ["exito" => $exito,
                                          "errores" => $errors,
                                           "dato" => $datos]);
    }
    function pagina($id){        
        $pagina = $this->instancia_paginas->find($id);
        if (is_null($pagina)) return redirect ()->to (site_url ("content/verpaginas"));
        return view("contenidos/paginas/page", ["dato" => $pagina]);
    }    
    public function deletePage($id){
        $this->instancia_paginas->delete($id);        
        return redirect()->to(site_url("content/verpaginas"));
    }
    function verpaginas(){        
        // Utilizamos la funcion listar para obtener todos los datos de la tabla        
        $paginas = $this->listar($this->instancia_paginas);
        return view("contenidos/paginas/showListOfPages", ["datos" => $paginas]);
    }
    
    
    /*---------------------FIN SECCIÓN PÁGINAS--------------------------*/
    
    /*--------------------- SECCIÓN COMENTARIOS ------------------------*/
    
    public function vercomentarios(){
        // Funcion personalizada para obtener el nombre del articulo al que pertenece cada comment     
        $comentarios = $this->instancia_comentarios->listar_comentarios();
         $paginas = $this->listar($this->instancia_paginas);         
        
        return view("contenidos/comentarios/showListOfComments", ["datos" => $comentarios,"paginas" => $paginas]);
    }
    public function editComment($id){
        $errors = [];
        $exito = ""; 
        if ($this->request->getMethod()=="post"){
            $actualizacion = $this->instancia_comentarios->actualizar_cuerpo($id, $_POST["cuerpo"]);   
            // Si todo sale bien, devuelve 1, es decir true
            if($actualizacion){
                $exito = "Comentario actualizado correctamente";
            }
            else{
                $exito = "No se ha actualizado ningun comentario";
            }
        }
        //Cargar el comentario actualizado o a actualizar
        $datos = $this->instancia_comentarios->find($id);
        //Si el id no existe $datos=NULL, entonces se redirige 
        if(is_null($datos)){
            return redirect()->to(site_url("content/verarticulos"));
        }
        
        return view("contenidos/comentarios/editComment", ["exito" => $exito,
                                                           "errores" => $errors,
                                                           "dato" => $datos]);
    }
    public function deleteComment($id){
       $this->instancia_comentarios->delete($id);       
       return redirect()->to(site_url("content/vercomentarios"));
    }
    
    
    /*------------------ FIN SECCIÓN COMENTARIOS ------------------------*/
    
    /*---------------------- SECCIÓN CATEGORÍAS ------------------------*/
    
    public function crearCategoria(){
        $datos = [
            "id" => "",
            "nombre" => "",
            "slug" => "",
            "descripcion" => ""
        ];
        $errors = [];
        $exito = ""; 
        $this->guardar($this->instancia_categorias,$exito,$errors);
        return view("contenidos/categorias/createCategory", ["exito" => $exito,
                                         "errores" => $errors,
                                         "dato" => $datos]); 
    }
    function editCategory($id){        
        $errors = [];
        $exito = ""; 
        $this->guardar($this->instancia_categorias, $exito, $errors);
        //Cargar la pagina actualizada o a actualizar
        $datos = $this->instancia_categorias->find($id);  
        if (is_null($datos)) return redirect ()->to (site_url ("content/vercategorias"));
        return view("contenidos/categorias/editCategory", ["exito" => $exito,
                                          "errores" => $errors,
                                           "dato" => $datos]);
    }
    public function vercategorias(){           
        $categorias = $this->listar($this->instancia_categorias);        
        return view("contenidos/categorias/showListOfCategories", ["datos" => $categorias]);
    }
    public function deleteCategory($id){
       $this->instancia_categorias->delete($id);       
       return redirect()->to(site_url("content/vercategorias"));
    }
    public function categoria($slug){
       $datos = $this->instancia_categorias->articulos_por_categoria($slug);
       if (is_null($datos)) return redirect ()->to (site_url ("content/vercategorias"));
       return view("contenidos/categorias/showArticlesPerCategory",
                    ["slug" => $slug, "datos" => $datos]);
    }
    
    /*-------------------FIN SECCIÓN CATEGORÍAS ------------------------*/
    
    
    
        

}