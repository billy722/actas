<?php
  class Conexion{

    private $servidor;
    private $usuario;
    private $clave;
    private $baseDatos;
    protected $varConexion;

    public function __construct()
    {
      $this->servidor="localhost";
      $this->usuario="root";
      $this->clave="82537240Guitar";
      $this->baseDatos="sistemadeactas";


      $this->varConexion = new mysqli($this->servidor,$this->usuario,$this->clave,$this->baseDatos);
        if ($this->varConexion->connect_errno) {
            echo "Error: Fallo al conectarse a MySQL debido a: \n";
            echo "Errno: " . $this->varConexion->connect_errno . "\n";
            echo "Error: " . $this->varConexion->connect_error . "\n";
            exit;
        }
    }

    public function consultaRegistros($arg_consulta){
      $resultado= $this->varConexion->query($arg_consulta);

        if(!$resultado) {
            echo "Error: La ejecución de la consulta falló debido a: \n";
            echo "Query: " . $sql . "\n";
            echo "Error numero: " . $this->varConexion->errno . "\n";
            echo "Error: " . $this->varConexion->error . "\n";
            exit;
        }else{
           $listado = $resultado->fetch_all(MYSQLI_ASSOC);
           return $listado;
        }
    }

    public function ejecutarConsulta($arg_consulta){
      //echo $arg_consulta;
       $resultado= $this->varConexion->query($arg_consulta);
       $filas= $resultado->fetch_array();
       echo $filas['res'];
    }

    public function consultaExistencia($arg_consulta){
      $resultado= $this->varConexion->query($arg_consulta);

        if (!$resultado) {
            echo "Lo sentimos, este sitio web está experimentando problemas.";
            echo "Error: La ejecución de la consulta falló debido a: \n";
            echo "Query: " . $sql . "\n";
            echo "Errno: " . $this->varConexion->errno . "\n";
            echo "Error: " . $this->varConexion->error . "\n";
            exit;
        }else{
            if($resultado->num_rows==0) {
              return false;//entrega false si no hay registros
            }else{
              return true;//entrega true si hay registros
            }
        }
    }

    public function mostrarVariables(){
      $variables= "host: ".$this->servidor."; user: ".$this->usuario."; clave: ".$this->clave."; baseDatos: ".$this->baseDatos;

      return $variables;
    }
  }
?>
