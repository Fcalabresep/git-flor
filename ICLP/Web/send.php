<?php

//librerias
  require 'PHPMailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer();
$mail->IsSMTP();

//Configuracion servidor mail
$mail->From = "administracion@iclpsrl.com.ar"; //remitente
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls'; //seguridad
$mail->Host = "smtp.gmail.com"; // servidor smtp
$mail->Port = 587; //puerto
$mail->Username ='administracion@iclpsrl.com.ar'; //nombre usuario
$mail->Password = 'iclp123456'; //contraseña
$mail->FromName = 'ICLP'; 
//Agregar destinatario
$mail->AddAddress('administracion@iclpsrl.com.ar');
$mail->Subject = "Contacto WEB";
$nombre=$_POST['nombre']; 
$email=$_POST['email'];
$tel=$_POST['telefono'];
$msj=$_POST['mensaje'];
$mail->Body ="Mensaje de " .$nombre.  "\nDatos personales:\nEmail:\n" .$email."\nTelefono:\n" .$tel. "\nMensaje:\n".$msj.".";

//Avisar si fue enviado o no y dirigir al index
if ($mail->Send()) {
    echo'<script type="text/javascript">
         
           window.location.assign("enviado.html");
           </script>';
        
} else {
    echo'<script type="text/javascript">
           alert("NO ENVIADO, intentar de nuevo");
           window.location.assign("contacto-error.html");
        </script>';
        


      }
?>