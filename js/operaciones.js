class operaciones{
    constructor(valor1, valor2){
        this.valor1=valor1;
        this.valor2=valor2;
    }
    sumarNumeros() {
        return this.valor1+ this.valor2;
    }
    restarNumeros() {
        return this.valor1-this.valor2;
    }
    multiplicarNumeros() {
        return this.valor1 * this.valor2;
    }
    dividirNumeros() {
        return this.valor1/this.valor2;
    }
}
function sumadeNumeros(){
    var n1=parseInt(document.getElementById("txtprimerN").value);
    var n2=parseInt(document.getElementById("txtsegundoN").value);
    //var resul=n1+n2;
    var resul= new operaciones(n1,n2)
    //window.alert(resul.sumarNumeros());
    document.getElementById("suma").innerHTML= "La suma es: " + resul.sumarNumeros();
}
function restadeNumeros(){
    var n1=parseInt(document.getElementById("txtprimerResta").value);
    var n2=parseInt(document.getElementById("txtsegundoResta").value);
    //var resul=n1+n2;
    var resul= new operaciones(n1,n2)
    //window.alert(resul.sumarNumeros());
    document.getElementById("resta").innerHTML= "La resta es: " + resul.restarNumeros();
}
function multiplicacionNumeros(){
    var n1=parseInt(document.getElementById("txtprimerMulti").value);
    var n2=parseInt(document.getElementById("txtsegundoMulti").value);
    //var resul=n1+n2;
    var resul= new operaciones(n1,n2)
    //window.alert(resul.sumarNumeros());
    document.getElementById("multiplicacion").innerHTML= "La multiplicación es: " + resul.multiplicarNumeros();
}

function dividisionNumeros(){
    var n1=parseInt(document.getElementById("txtprimerDivision").value);
    var n2=parseInt(document.getElementById("txtsegundoDivision").value);
    //var resul=n1+n2;
    var resul= new operaciones(n1,n2)
    //window.alert(resul.sumarNumeros());
    document.getElementById("division").innerHTML= "La división es: " + resul.dividirNumeros();
}