<?php
namespace App\Models;

use CodeIgniter\Model;

class CategoriesModel extends Model{
    
    // Tabla que se usará en este modelo
    protected $table = "categorias";
    
    //Llave primaria de nuestra tabla
    protected $primaryKey = "id";
    
    //Varible que define como la base de datos nos entrega informacion (opcional)
    protected $returnType = "array";
    
    //Campos habilitados para su escritura en la tabla
    protected $allowedFields = ["id", "nombre", "descripcion", "slug"];
    
    //Reglas de validación
    protected $validationRules = [
        'nombre' => 'required|max_length[40]|is_unique[categorias.nombre]',     
        'descripcion' => 'required',    
        'slug' => 'required|max_length[30]|alpha_dash'
        ];        
    
    //Mensajes de validación
    protected $validationMessages = [       
        'nombre' => [            
            'max_length' => 'El nombre de categoría es muy largo',
            'required' => 'El nombre es requerido',
            'is_unique' => 'El nombre de categoría tiene que ser único'
        ],
        'descripcion' => [            
            'required' => 'La descripción es requerida'            
        ],
        'slug' => [            
            'max_length' => 'El slug es muy largo',
            'required' => 'El slug es requerido',
            'alpha_dash' => 'El slug no puede tener espacios ni signos especiales (excepto por guión o guión bajo)'
        ]
    ];
    
    protected $useTimestamps = true;   
    
    
    public function articulos_por_categoria($slug){
        $db = \Config\Database::connect();
        $query = $db->query("SELECT contenidos.id, contenidos.titulo, contenidos.img_principal, contenidos.encabezado, contenidos.cuerpo, categorias.nombre "
                . "FROM categorias INNER JOIN contenidos ON categorias.id=contenidos.categoria WHERE categorias.slug='$slug'");
        $afectados = $query->getResultArray();
        $db->close();
        return $afectados; 
    }

    
    public function actualizar_cat($id){
        $db = \Config\Database::connect();
        $query = $db->query("UPDATE contenidos SET contenidos.categoria=1 WHERE contenidos.categoria=$id");
        $afectados = $db->affectedRows();
        $db->close();
        return $afectados;        
    }

    
}

