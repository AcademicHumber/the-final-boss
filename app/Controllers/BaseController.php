<?php
namespace App\Controllers;

use App\Models\UsuarioModel;
use App\Models\ContentModel;
use App\Models\PagesModel;
use App\Models\CommentsModel;
use App\Models\CategoriesModel;
/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];
        
        protected $session;
        
        //Instacias de los modelos
        protected  $instancia_usuarios;
        protected  $instancia_articulos;
        protected  $instancia_paginas;
        protected  $instancia_comentarios;
        protected  $instancia_categorias;
        /**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
                $this->session = session();
		// E.g.:
		// $this->session = \Config\Services::session();
                 $this->instancia_usuarios = new UsuarioModel();
                 $this->instancia_articulos = new ContentModel();
                 $this->instancia_paginas = new PagesModel();
                 $this->instancia_comentarios = new CommentsModel();
                 $this->instancia_categorias = new CategoriesModel();
	}

}
