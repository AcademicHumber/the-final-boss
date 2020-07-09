<?php namespace App\Controllers;


class Blog extends BaseController 
{
	public function index()
	{		
           $paginas = $this->instancia_paginas->findAll();
           $categorias = $this->instancia_categorias->findAll();
           $articulos = $this->instancia_articulos->listar_articulos();         
           return view("frontend/articulos", ["articulos" => $articulos, "paginas" => $paginas, "categorias" => $categorias ]);           
	}
	  protected function listar($instancia) {        
        $lista = $instancia->findAll();
        return $lista;
    }


     public function pagina($id){
        
        $pagina = $this->instancia_paginas->find($id);
        if (is_null($pagina)) return redirect ()->to (site_url ("blog"));
        $paginas = $this->listar($this->instancia_paginas);
        return view("frontend/pagina", ["dato" => $pagina, "paginas" => $paginas] );
    }    
     
  public function articulos($id){    
  	helper("form");       
        
        //cargar articulo
        $articulo = $this->instancia_articulos->find($id);
        //
        $articulo_user = $this->instancia_articulos->listar_articulos();
        if(is_null($articulo)){
            return redirect()->to(site_url("blog"));
        }
        //cargar categorias
        $categorias = $this->listar($this->instancia_categorias); 
        //cargar comentarios para el articulo
        $comentarios = $this->instancia_comentarios->comentarios_del_articulo($id);
        //Cargar paginas
        $paginas = $this->listar($this->instancia_paginas);
                      
        return view("frontend/un_article", ["dato" => $articulo,
                                            "comentarios" => $comentarios,
                                            "categorias" => $categorias,
                                            "paginas" => $paginas,
                                            "dato_user"=>$articulo_user]);
    }
    public function guardar_comment(){
        $exito = "";
        $errors = "";
        $this->guardar($this->instancia_comentarios, $exito, $errors);
        return redirect()->to(site_url("blog/articulos/".$_POST["cont"]["articulo"]));
    }
    public function deleteComment($id, $articulo){        
       $this->instancia_comentarios->delete($id);       
       return redirect()->to(site_url("blog/articulos/".$articulo));
    }
    
    public function guardar($instancia, &$exito, &$errors) {              
        
        if ($this->request->getMethod() == "post"){
           // juntamos todo lo que viene en una sola variable
            $content = $_POST["cont"];            
           // Insertamos los datos a la BD, utilizando la funcion insert del modelo
            $guardar = $instancia->save($content);
           
           //Comprobamos el resultado
            if ($guardar){
               // Mesaje de éxito
               $exito = "Se guardó todo correctamente";
           }
            else{
               // Mesnaje de error
               $exito = "Hubieron errores al guardar";
               // Guardamos los errores que hubieron
               $errors = $instancia->errors();
           }
           
        }        
    }  

        

}
