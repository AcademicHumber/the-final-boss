<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model {

    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = true;


    public function __construct(\CodeIgniter\Database\ConnectionInterface &$db = null,
            \CodeIgniter\Validation\ValidationInterface $validation = null) {
        parent::__construct($db, $validation);

        $this->allowedFields = ['nombre_usuario', 'nombre', 'apellido', 'correo', 'contrasena', 'perfil'];

        $this->validationRules = [
            "nombre_usuario" => "required|min_length[5]|max_length[50]|is_unique[user.nombre_usuario]",
            "nombre" => "required|min_length[3]|max_length[255]",
            "apellido" => "required|min_length[3]|max_length[255]",
            "correo" => "required|min_length[6]|max_length[50]|valid_email|is_unique[user.correo]",
            "contrasena" => "required|min_length[5]|max_length[255]",
            "contrasena_confir" => "required|matches[contrasena]",
            "perfil" => "min_length[5]|max_length[255]",
        ];
        $this->validationMessages = [
            "nombre_usuario" => [
                "is_unique" => "El nombre de usuario ya existe",
                "required" => "Datos requeridos",
                "max_length" => "Nombre de usuario muy largo, máximo 50 caracteres",
                "min_length" => "Nombre de usuario muy corto, mínimo 5 caracteres"
            ],
            "nombre" => [
                "required" => "Datos requeridos",
                "max_length" => "Nombre muy largo, máximo 255 caracteres",
                "min_length" => "Nombre muy corto, mínimo 3 caracteres"
            ],
            "apellido" => [
                "required" => "Datos requeridos",
                "max_length" => "Apellido muy largo, máximo 255 caracteres",
                "min_length" => "Apellido muy corto, mínimo 3 caracteres"
            ],
            "correo" => [
                "required" => "Datos requeridos",
                "valid_email" => "Debe de tener una dirección de correo válida",
                "max_length" => "Máximo 50 caracteres",
                "min_length" => "Mínimo 6 caracteres",
                "is_unique" => "El correo que ingreso ya existe"
            ],
            "contrasena" => [
                "required" => "Datos requeridos",
                "max_length" => "Contraseña muy larga, máximo 50 caracteres",
                "min_length" => "Contraseña muy corta, mínimo 5 caracteres"
            ],
            "contrasena_confir" => [
                "required" => "Datos requeridos",
                "matches" => "La contraseña no es igual",
            ]
        ];
   
    }
   
    //Este metodo selecciona el id del usuario, requiere del argumento id
    public function idUsuario($id) {
        return $this->asArray()
                        ->where(["id" => $id])
                        ->first();
    }

    //metodo para borrar, requiere del argumento id
    public function borrar($id) {
        $borrado = $this->db->query('DELETE FROM `user` WHERE `id`=:id:', ["id" => $id]);
        $affected_rows = $this->db->affectedRows();
        return ($affected_rows > 0);
    }

     //metodo para seleccionar el correo del usuario, devuelve una sola fila.
    public function correo($correo) {
        $query = $this->db->query("SELECT * FROM `user` WHERE `correo`=:correo: ", ["correo" => $correo]);
        return $query->getRowArray();
    }

}
