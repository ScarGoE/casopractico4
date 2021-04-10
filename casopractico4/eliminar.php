<?php
$cliente = new SoapClient(null, array(
    'location'=>'http://localhost/casopractico4/server.php',
    'uri'=>'http://localhost/casopractico4/server.php',
    'trace'=>1
));

try {
  if (isset($_GET['id'])) {
    $id= $_GET['id'];
    $respuesta=$cliente->__soapCall("eliminarpeliculas", [$id]);
      header ("Location:http://localhost/casopractico4/cliente.php?success=delete");
  }
//  var_dump( explode(' ', $respuesta));
} catch (SoapFault $ex) {
    echo $ex->getMessage().PHP_EOL;
}

?>