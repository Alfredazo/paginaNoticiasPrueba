<?php
require_once "../Clases/Conexion.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $db = new Conexion();

     $db->abrirConexion();

     $myArr = $db->getArraySQL('Select * from noticias;');
     //Meter todo eso al json
     $myJSON = json_encode($myArr,JSON_UNESCAPED_UNICODE);
     //Crear un array de objetos
     $ObjetoJson =  json_decode($myJSON);
     echo('JSON : '. $myJSON);
     echo '</br>';
     echo "  ----------PRUEBAS GENERICAS-------------  ";
     echo '</br>';
     print_r('ARRAY: ' . $myArr[1][1]);
     echo '</br>';
     echo "  -----------------------  ";
     echo '</br>';
     print_r('OBJETO: ' . $ObjetoJson[1]->titulo);

     ?>

      <?php
       for ($i=0; $i < sizeof($ObjetoJson); $i++) {
          echo '<h1>'. $ObjetoJson[$i]->titulo .'</h1>';
          echo '<p>'.  $ObjetoJson[$i]->mensaje .'</p>';
          echo '<h6>'. $ObjetoJson[$i]->estado .'</h6>';
          echo '</br>';
       }
      ?>



  </body>
</html>
