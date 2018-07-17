<?php
class Conexion {
    //Atributos
    private $usuario = "root";
    private $clave = "";
    private $host = "127.0.0.1";
    private $bdatos = "paginanoticias";
    private $conex = "";

    //Constructor Vacio
    public function _construct() {

    }

    //Funcion de conexion
    public function abrirConexion() {
        //Establecer la conexion en la bd
        $this->conex = mysqli_connect($this->host, $this->usuario, $this->clave) or die("Problema de Conexion a la Bd");
        //Seleccionar Base de datos y pasarle los parametros de nombre y conexion
        $db_select = mysqli_select_db($this->conex,$this->bdatos);
        if (!$db_select) {
          die("Database selection failed: " . mysqli_error($this->conex));
        }
    }
    //Ejecutar Consulta
    public function ejecutarTransaccion($sql) {
        $this->abrirConexion();
        mysqli_set_charset($this->conex, "utf8"); //formato de datos utf8
        $result = mysqli_query($this->conex,$sql) or die("Error Sentencia SQL: " . $sql . " " . mysqli_error());
        return $result;
    }


    function getArraySQL($sql){
      //Creamos la conexión con la función anterior
      $this->abrirConexion();

      $result = $this->ejecutarTransaccion($sql);

      $rawdata = array(); //creamos un array

      //guardamos en un array multidimensional todos los datos de la consulta
      $i=0;

      while($row = mysqli_fetch_array($result))
      {
          $rawdata[$i] = $row;
          $i++;
      }

      return $rawdata; //devolvemos el array
    }

}

?>
