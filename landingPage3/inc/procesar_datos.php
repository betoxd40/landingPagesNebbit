<?php	

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$email = $_POST["email"];  
$telefono = $_POST["telefono"];
$ciudad = $_POST["ciudad"];
$email_to="lozano.ricardo91@gmail.com";
$email_corporativ="Nebbit Informacion <contacto@nebbit.com>";
$email_subject="Landing page Nebbit";
$email_message="Han enviado Cotizacion Nebbit.\n\n";
$email_message .= "Nombre: " . $_POST['nombre'] . "\n";
$email_message .= "Apellido: " . $_POST['apellido'] . "\n";
$email_message .= "Correo Electrónico: " . $_POST['email'] . "\n";
$email_message .= "Teléfono: " . $_POST['tlefono'] . "\n";
$email_message .= "Ciudad: " . $_POST['ciudad'] . "\n";

$bcc="contacto@nebbit.com";

$link=mysql_connect("localhost" , "ventafac_alberto" , "Nebbit.2017");

if((mysql_select_db("ventafac_humberto",$link)==true)&&($nombre!=null))
{

$_GRABAR_SQL = "INSERT INTO datos_clientes (id,nombre,apellido,email,telefono,ciudad) VALUES (NULL,'$nombre','$apellido','$email','$telefono','$ciudad')"; 
mysql_query($_GRABAR_SQL); 
 ?><p>Gracias. La informacion ha sido enviada correctamente!</p><?php 

//Notificaciones 
$headers = 'From: '.$email."\r\n".
'Reply-To: '.$email."\r\n" .
'BCC: '.$bcc."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);

$email_subj="Informacion Nebbit";
$email_mess="Gracias por contactarse con Nebbit . Pronto nos pondremos en contacto con usted a la brevedad posible .";
$WEBSITE="nebbit.com";
//Envio email a cliente
$headers ="From: ".$email_corporativ."\r\n".
'Reply-To: '.$email_corporativ."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email, $email_subj, $email_mess, $headers);

}else{
echo "Conexion a la bd incorrecta";
echo $fuente;
}

?>