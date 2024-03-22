<?php
  define('hostnameBDD','127.0.0.1');
  define('usernameBDD', 'root');
  define('passwordBDD','');
  define('databaseBDD','biblioteca');
  

    function mysqli_sql($cadenaSQL = "", $sinretorno = false){

        try{

            $conexionBDD = mysqli_connect(hostnameBDD, usernameBDD, passwordBDD, databaseBDD) or die("Error: " . mysqli_error($conexionBDD));
        
            $resultadoBDD = mysqli_query($conexionBDD, $cadenaSQL) or die("Error: " . mysqli_error($conexionBDD));
        if(!$sinretorno){
            $listado = array();
            while($fila = mysqli_fetch_assoc($resultadoBDD)){
                $listado[] = $fila;
                
            }
            mysqli_free_result($resultadoBDD);
            return $listado;}
        } catch(PDOException $e){}

    }

?>