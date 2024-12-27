var a=1,z=3;
var b=5,y=8;
var suma= a+b;
window.alert(suma);
console.log(typeof(suma))

var estudiantes={nombre:"Carlos", apellido:"Nuñez",profesion: "Docentes", edad:45}
console.log(typeof(estudiantes))
console.log(estudiantes.edad)

function Mensaje(){
    console.log("Hola mundo")
}

Mensaje()

function Mensaje2(Saludo){
    console.log(Saludo)
}

Mensaje2("Hola, como estas")



const car = {type:"Great",model:"Wall", color:"black" };
document.getElementById("demo").innerHTML="el color del carro es: "+ car.color;