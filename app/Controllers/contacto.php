<?php namespace App\Controllers;

class Contacto extends BaseController
{
    private function validarEmail(&$errores, &$enviado){

        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $mensaje = $_POST['mensaje'];
    

    // Si el campo del nombre está en blanco

	if (!empty($nombre)) {
		$nombre = trim($nombre);
		$nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
	}else{
		$errores .= 'Por favor ingresa un nombre <br />';
	}

    // Si el campo del correo está en blanco o no es un correo válido

    if (!empty($correo)) {
        $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);

        if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
            $errores .= 'Por favor ingresa un correo valido <br />';
        }

    }else{
            $errores .= 'Por favor ingresa un correo <br />';
        }

    // Si el campo del mensaje está en blanco


	if (!empty($mensaje)) {
		$mensaje = htmlspecialchars($mensaje);
		$mensaje = trim($mensaje);
		$mensaje = stripcslashes($mensaje);
	} else {
		$errores .= 'Por favor ingresa el mensaje';
    }
    

    // enviar mensaje

    if (!$errores) {

        $email = \Config\Services::email();

        $enviar_a = "enriquetm1818@hotmail.com";
        $asunto = 'Correo enviado desde: www.blog-all.org';
        $mensaje_pre = "De: $nombre \n";
		$mensaje_pre .= "Correo: $correo \n";
		$mensaje_pre .= "Mensaje: " . $mensaje;
        
        $email->setFrom($correo, $nombre);
        $email->setTo($enviar_a);
        $email->setSubject($asunto);
        $email->setMessage($mensaje_pre);

        if($email->send()){
            $enviado = true;

        }else{
            $enviado = false;
            
        }



		
	}



    }
    public function index()

	{

        $errores = "";
        $enviado = "";

        if($this->request->getMethod()=="post"){
            $this -> validarEmail($errores, $enviado);
        }

        return view('contacto/form_contacto', ["errores" => $errores, "enviado" => $enviado]);
        
    }

    

}
