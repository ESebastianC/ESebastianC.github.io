<?php
$automovil1=(object)["marca"=>"toyota","modelo"=>"RAV","color"=>"negro"];
$automovil2=(object)["marca"=>"ford","modelo"=>"F150","color"=>"azul"];
function mostrar($automovil1){
    echo("El auto: $automovil1 ->marca");
}
mostrar($automovil2);
?>