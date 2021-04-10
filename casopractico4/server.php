<?php

class peliculas
{
    public function showData()
    {
        $dataset="";
        $conn = new mysqli("localhost", "root", "", "peliculas");
        $sql  = "SELECT * FROM pelicula ORDER BY id DESC";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
        
        foreach ($result as $data) {
            $dataset .= ("<tr>");
            $dataset .= ("<td>" . $data['id'] . "</td>");
            $dataset .= ("<td>" .$data['titulo']. "</td>");
            $dataset .= ("<td>" .$data['fecha'] . "</td>");
            $dataset .= ("<td>" .$data['costo'] . "</td>");
            $dataset .= ("<td >
            <form action='http://localhost/casopractico4/eliminar.php?id=". $data['id']."' method='post'>
            <button name='id' class='btn btn-danger id-eliminar'>eliminar
            </form>
            </td>");
            $dataset .= ("<td><button class='id btn btn-warning' data-bs-toggle='modal' data-bs-target='#editModal' data-bs-whatever='@mdo'>actualizar</button></td>");
            $dataset .= ("</tr>");
        }
    }else{
        $dataset = "<tr><td colspan='6'>no se encontró titulo</td></tr>";
    }
        return $dataset;
    }
    public function agregarpeliculas($titulo, $fecha, $costo)
    {
        $dataset="";
        $conn = new mysqli("localhost", "root", "", "peliculas");
        $sql = "INSERT INTO pelicula (titulo, fecha, costo) VALUES('$titulo', '$fecha', $costo)";
        if($conn->query($sql) === true){
            return $dataset= "Se agregó correctamente";
        }else{
            return $dataset ="Error al agregar";
        }
    }

    public function actualizarpeliculas($id, $titulo, $fecha, $costo)
    {
        $dataset="";
        $conn = new mysqli("localhost", "root", "", "peliculas");
        $sql = "UPDATE pelicula SET titulo='$titulo', fecha='$fecha', costo='$costo' WHERE id= '$id'";
        if ($conn->query($sql) === TRUE) {
                echo 1;
          } else {
            echo "Error de actualización: " . $conn->error;
          }
    }
    public function eliminarpeliculas($id)
    {
        $dataset="";
        $conn = new mysqli("localhost", "root", "", "peliculas");
        $sql = "DELETE FROM pelicula WHERE id = '$id'";
        if ($conn->query($sql) === TRUE) {
            echo 1;
      } else {
        echo "Error de actualización:" . $conn->error;
      }
    }
}
try {
    $server = new SoapServer(
        null,
        [
            'uri' => 'http://localhost/casopractico4/server.php'
        ]
    );
    $server->setClass('peliculas');
    $server->handle();
} catch (SoapFault $e) {
    print $e->faultstring;
}