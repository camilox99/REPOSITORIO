<?php
$nombre = $_POST['name'];
$mail = $_POST['email'];
$empresa = $_POST['message'];

$header = 'From: ' . $mail . " \r\n";
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";

$mensaje = "Este mensaje fue enviado por " . $nombre . ",\r\n";
$mensaje .= "Su e-mail es: " . $mail . " \r\n";
$mensaje .= "Mensaje: " . $_POST['message'] . " \r\n";
$mensaje .= "Enviado el " . date('d/m/Y', time());

$para = 'camiloacostaf97@gmail.com';
$asunto = 'Mensaje de mi sitio web';

mail($para, $asunto, utf8_decode($mensaje), $header);
if ($mensaje){
    echo json_encode(
        'Su mensaje ha sido envido con exito' //Por ejemplo: Los 54 datos han sido guardados satisfactoriamente
    );
}
else{
    echo json_encode(
        'estado' => 'error',
        'mensaje' => 'Descripción del error' //Si usas la extensión MySQLi, puedes usar la función mysqli_error()
    );
}
header("Location:index.html");
?>
