<?php
$cliente = new SoapClient(null, array(
    'location'=>'http://localhost/casopractico4/server.php',
    'uri'=>'http://localhost/casopractico4/server.php',
    'trace'=>1
));

try {
  if (isset($_POST['id2']) && isset($_POST['titulo']) && isset($_POST['fecha']) && isset($_POST['costo'])) {
    $id= $_POST['id2'];
    $titulo=  $_POST['titulo'];
    $fecha = $_POST['fecha'];
    $costo = $_POST['costo'];
    $respuesta=$cliente->__soapCall("actualizarpeliculas", [$id, $titulo, $fecha, $costo]);
      header ("Location:http://localhost/casopractico4/cliente.php?success=update");
  }
//  var_dump( explode(' ', $respuesta));
} catch (SoapFault $ex) {
    echo $ex->getMessage().PHP_EOL;
}
?>