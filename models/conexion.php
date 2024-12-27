<?php
class conexion{
    public function conectar(){
        $servername="localhost";
        $username="root";
        $password="";
        $dbname="cuarto";
        $conn=mysqli_connect($servername,$username,$password,$dbname);
        if(!$conn){
            echo("Error en la conexion".mysqli_connect_error());
        }else{
            return $conn;
        }
     
    }

}

?>