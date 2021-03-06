<?php
namespace App\Models;

use CodeIgniter\Model;

class ContentModel extends Model{

// En el archivo config/database.php es necesario configurar el ingreso a la BD     
// Declarar en el modelo, variables con informacion sobre nuestra tabla
    
    // Tabla que se usará en este modelo
    protected $table = "contenidos";
    
    //Llave primaria de nuestra tabla
    protected $primaryKey = "id";
    
    //Varible que define como la base de datos nos entrega informacion (opcional)
    protected $returnType = "array";
    
    //Campos habilitados para su escritura en la tabla
    protected $allowedFields = ["id", "titulo", "img_principal", "encabezado", "cuerpo", "categoria", "usuario_creador"];
    
    //Configurar si queremos que se agreguen los campos "creado a:" y "actualizado a: " para los horarios (opcional)
    protected $useTimestamps = true;
    
    //Reglas de validación
    protected $validationRules = [
        'titulo' => 'required|min_length[3]|max_length[40]',
        'encabezado' => 'required|min_length[3]|max_length[300]',        
        'cuerpo' => 'required|min_length[20]'        
    
        ];
        
    
    //Mensajes de validación
    protected $validationMessages = [
        'titulo' => [
            'max_length' => 'Ese es un titulo muy largo, por favor coloca uno más corto',
            'min_length' => 'Ese es un titulo muy corto, por favor coloca uno más largo',
            'required' => 'El titulo es requerido'
        ],
        'encabezado' => [
            'max_length' => 'Ese es un encabezado muy largo, por favor coloca uno más corto',
            'min_length' => 'Ese es un encabezado muy corto, por favor coloca uno más largo',
            'required' => 'El encabezado es requerido'
        ],        
        'cuerpo' => [            
            'min_length' => 'Ese es un cuerpo del articulo muy corto, por favor coloca uno más largo',
            'required' => 'El cuerpo es requerido'            
        ]
    ];
    
    // Con esto se añadira una cadena al final de cada cuerpo, porque sino se bugea xdxd
    
    protected $beforeInsert = ['agregar_espacios_al_cuerpo'];
    protected $beforeUpdate = ['agregar_espacios_al_cuerpo'];
    
    protected function agregar_espacios_al_cuerpo(array $data){
        $data['data']['cuerpo'] .= "\n   ";
        return $data;
    }
    
    //Configurar el saltar la validacion (opcional, por defecto viene en false)
    protected $skipValidation = false; 
    
    public function listar_articulos() {
        $db = \Config\Database::connect();
        // consulta para obtener los titulos de los articulos por comentario
        $query = $db->query( "SELECT contenidos.id, contenidos.titulo,
            contenidos.cuerpo, contenidos.img_principal, contenidos.created_at, contenidos.updated_at
            , contenidos.usuario_creador, contenidos.encabezado, user.nombre, user.perfil, categorias.nombre AS nombre_cat
                  FROM contenidos
                  INNER JOIN user ON contenidos.usuario_creador=user.id
                  INNER JOIN categorias ON contenidos.categoria=categorias.id 
                  ORDER BY contenidos.created_at DESC");
        return $query->getResultArray();
    }

      
    
}
