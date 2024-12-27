<?php
$Numeros=20;
$Numero2=50;
$resultado =$Numeros+$Numero2;
print_r($resultado);
var_dump($resultado);
print_r("<br>");
$cadena="hola";
print_r($cadena);
var_dump($cadena);
print_r("<br>");
$condicion=true;
print_r($condicion);
var_dump($condicion);
print_r("<br>");
$vector=array("lunes", "martes", "miercoles", "jueves");
print_r($vector);
var_dump($vector);
//Array con propiedades
print_r("<br>");
$frutas=array("Fruta1"=>"manzanas", "Fruta2"=>"peras");
print_r("<br>");
print_r($frutas["Fruta1"]);
var_dump($frutas);
//como objetos
print_r("<br>");
$persona=(object)["nombre"=>"carlos", "apellido"=>"nuñez"];
print_r("<br>");
print_r($persona);
var_dump($persona);
print_r("<br>");
print_r($persona->nombre);
print_r("<br>");
echo($persona->apellido);

function despedida($mensaje){
    echo $mensaje;
}
print_r("<br>");
despedida("Hasta Luego");

//marca modelo y color y crear un metodo de impresion del carro
$auto1=(object)["marca"=>"toyota", "modelo"=>"rav", "color"=>"negro"];
$auto2=(object)["marca"=>"ford", "modelo"=>"f150", "color"=>"rojo"];

function automovil($auto){
    echo($auto->marca." ".$auto->modelo." ".$auto->color);
}
print_r("<br>");
automovil($auto2);


?>
