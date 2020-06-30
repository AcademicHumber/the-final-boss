<?php namespace App\Controllers;

class Blog extends Content 
{
	public function index()
	{
           $paginas = $this->listar($this->instancia_paginas);
           $articulos = $this->instancia_articulos->listar_articulos();
           
           return view("frontend/articulos", ["articulos" => $articulos, "paginas" => $paginas]);           
	}

	//--------------------------------------------------------------------

}
