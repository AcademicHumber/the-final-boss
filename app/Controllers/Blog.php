<?php namespace App\Controllers;


class Blog extends BaseController 
{
	public function index()
	{
           $paginas = $this->instancia_paginas->findAll();
           $articulos = $this->instancia_articulos->listar_articulos();
           
           return view("frontend/articulos", ["articulos" => $articulos, "paginas" => $paginas]);           
	}

        public function articulo($id){
            
        }

}
