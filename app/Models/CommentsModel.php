<?php
namespace App\Models;

use CodeIgniter\Model;

class CommentsModel extends Model{
    
    // Tabla que se usará en este modelo
    protected $table = "comentarios";
    
    //Llave primaria de nuestra tabla
    protected $primaryKey = "id";
    
    //Varible que define como la base de datos nos entrega informacion (opcional)
    protected $returnType = "array";
    
    //Campos habilitados para su escritura en la tabla
    protected $allowedFields = ["cuerpo", "articulo", "usuario"];
    
    //Configurar si queremos que se agreguen los campos "creado a:" y "actualizado a: " para los horarios (opcional)
    protected $useTimestamps = true;
    
    //Reglas de validación
    protected $validationRules = [
        'cuerpo' => 'required'     
        ];        
    
    //Mensajes de validación
    protected $validationMessages = [       
        'cuerpo' => [           
            'required' => 'El cuerpo es requerido'            
        ]
    ];
    
    public function comentarios_del_articulo($id) {
        return $this->where('articulo', $id)->findAll();
    }
    public function listar_comentarios() {
        $db = \Config\Database::connect();
        // consulta para obtener los titulos de los articulos por comentario
        $query = $db->query( "SELECT comentarios.id, contenidos.titulo,
            comentarios.cuerpo, comentarios.created_at, comentarios.updated_at
            , comentarios.usuario, comentarios.articulo
                  FROM comentarios
                  INNER JOIN contenidos ON comentarios.articulo=contenidos.id");
        return $query->getResultArray();
    }
    public function actualizar_cuerpo($id, $cuerpo){
        $db = \Config\Database::connect();
        $query = $db->query("UPDATE comentarios SET comentarios.cuerpo='$cuerpo' WHERE comentarios.id=$id");
        $afectados = $db->affectedRows();
        $db->close();
        return $afectados;        
    }
}
