<?php
include "class.phpmailer.php"; //Necesita estos dos archivos para furrular 
include "class.smtp.php";      // este en concreto es por si queremos utilizar un server smtp para sendMail no hace falta. 

//enviar_mensaje(["elkin-951011@hotmail.com"],"asunto","mensaje");

function enviar_mensaje($correo_destino, $asunto, $mensaje){
  $mail = new PHPMailer(true); // Declaramos un nuevo correo, el parametro true significa que mostrara excepciones y errores. 
    
  $mail->IsSMTP(); // Se especifica a la clase que se utilizará SMTP 

  try {
  //------------------------------------------------------ 
    $correo_emisor="driverwarrior@gmail.com";     //Correo a utilizar para autenticarse 
    //con Gmail o en caso de GoogleApps utilizar con @tudominio.com 
    $nombre_emisor="driverwarrior@gmail.com";               //Nombre de quien envía el correo 
    $contrasena="Baihplpeff*90";          //contraseña de tu cuenta en Gmail 
  //-------------------------------------------------------- 
    $mail->SMTPDebug  = 0;                     // Habilita información SMTP (opcional para pruebas) 
                                              // 0 -> Sin mensajes de debug
                                              // 1 -> Diálogo de cliente a servidor
                                              // 2 -> Diálogo de cliente a servidor y viceversa
                                              // 3 -> Códigos de estado de cada fase de la conexión, además del diálogo entre cliente y servidor/servidor y cliente
                                              // 4 -> Devuelve a bajo nivel toda la traza de la conversación entre cliente y servidor SMTP
    $mail->SMTPAuth   = true;                  // Habilita la autenticación SMTP 
    $mail->SMTPSecure = "SSL";            // Establece el tipo de seguridad SMTP 
    $mail->Host       = "smtp.gmail.com";  // Establece Gmail como el servidor SMTP 
    $mail->Port       = 465;                   // Establece el puerto del servidor SMTP de Gmail 
    $mail->Username   = $correo_emisor;        // Usuario Gmail 
    $mail->Password   = $contrasena;           // Contraseña Gmail 

    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        ));

    //A que dirección se puede responder el correo 
    $mail->AddReplyTo($correo_emisor, $nombre_emisor); 
    //La direccion a donde mandamos el correo 
    foreach ($correo_destino as &$correo) {
      $mail->AddAddress($correo);
    }
    //De parte de quien es el correo 
    $mail->SetFrom($correo_emisor, $nombre_emisor); 
    //Asunto del correo 
    $mail->Subject = $asunto; 
    //Mensaje alternativo en caso que el destinatario no pueda abrir correos HTML 
    $mail->AltBody = 'para ver el mensaje necesita un cliente de correo compatible con HTML.'; 
    //El cuerpo del mensaje, puede ser con etiquetas HTML 
    $mail->MsgHTML($mensaje); 
    $mail->CharSet = 'UTF-8';
    //Enviamos el correo 
    $mail->Send(); 
    
  } catch (phpmailerException $e) {
    $error = $e->getMessage();
    echo $e->errorMessage(); //Errores de PhpMailer 
  } catch (Exception $e) {
    echo $e->getMessage(); //Errores de cualquier otra cosa. 
  }
}

?>