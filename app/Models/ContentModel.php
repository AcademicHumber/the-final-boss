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
    
    //Configurar la eliminación de archivos (opcional)
    protected $useSoftDeletes = false;
    
    //Campos habilitados para su escritura en la tabla
    protected $allowedFields = ["titulo", "encabezado", "cuerpo"];
    
    //Configurar si queremos que se agreguen los campos "creado a:" y "actualizado a: " para los horarios (opcional)
    protected $useTimestamps = true;
    
    //Reglas de validación
    protected $validationRules = [];
    
    //Mensajes de validación
    protected $validationMessages = [];
    
    //Configurar el saltar la validacion (opcional, por defecto viene en false)
    protected $skipValidation = false;
    
}
