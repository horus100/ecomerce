// Declaro un arreglo producto para almacenar los id de los productos
const productos = [];

// Leo el total de productos cargados
var tproductos= document.getElementById('tproductos').value;

// Bucle para cargar nombre de cada producto en el arreglo productos, segun su atributo id
for (var i = 0; i < parseInt(tproductos); i++){
    var nombre=document.getElementById('nombre'+i).textContent;
    productos[i]={'nombre':nombre};   
}

//Declaracion de las constantes

//Constante formulario que recibe la ubicacion del elemento que contendra el texto del nombre del producto
const formulario = document.querySelector('#formulario');

//Constante resultado que recibe la ubicacion del elemento que contendra el mensaje
const resultado=document.querySelector('#mensaje');

//Funcion filtrar
const filtrar = () => {
    // Constante text que recibe el texto y lo convierte en minuscula
    const text = formulario.value.toLowerCase();

    //Declaracion de 2 variables contadores para conocer las iteraciones de los bules
    var index=0;
    var no_encontrado=0;

    // Bucle para cargar el elemento producto del arreglo productos
    for (let producto of productos){
        // Convierte el nombre del producto en minuscula y la almacena en la variable nombre
        let nombre = producto.nombre.toLowerCase();
        //Almacena la ubicacion del div de cada producto
        var div=document.getElementById('producto'+index);

        if(nombre.indexOf(text) === -1){ // Filtra los elementos que no coinciden
            div.style.display="none";
            no_encontrado++;

        }else{       // De lo contrario no hace nada o si antes se ha ocultado se remueve su ocultado

            if(div.hasAttribute("style")){ 
                div.removeAttribute("style");
            }
            resultado.innerHTML = '';

        }
        index++;
    }

    // Comprueba si no se ha encontrado ningun producto, mediante el total de iteraciones con el total de veces no 
    //  encontrado
    // Tambien comprueba que el cuadro de texto tenga datos ingresado
    if(index===no_encontrado && text!=null) {
        resultado.innerHTML = ' <h3> Producto no Encontrado</h3>';
    }
}
    formulario.addEventListener('keyup',filtrar);
    filtrar();

