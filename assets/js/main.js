/*==================== Slider ====================*/

const slider = document.querySelector(".sliderContainer"); //Contenedor de las diapositivas
const menuObjetos = document.querySelectorAll(".menuObjeto"); //Botones de navegación

let productoElegido = productos[0]; //Producto elegido por defecto

const productoImgActual = document.querySelector(".productoImg"); //Imagen del producto actual
const productoTituloActual = document.querySelector(".productoTitulo"); //Titulo del producto actual
const productoPreciogActual = document.querySelector(".productoPrecio"); //Precio del producto actual
const productoColoresActual = document.querySelectorAll(".color"); //Colores del producto actual
const productoSizesActual = document.querySelectorAll(".size"); //Tallas del producto actual

menuObjetos.forEach(function (objeto, i) { //Recorremos los botones de navegación
    objeto.addEventListener("click", function () { //Añadimos un evento de click a cada botón
        //cambiar la diapositiva actual
        slider.style.transform = `translateX(${-100 * i}vw)`;

        //Cambiar el producto elegido
        productoElegido = productos[i];

        //Cambiar los datos del producto actual
        productoTituloActual.textContent = productoElegido.titulo; //Cambiamos el titulo del producto actual
        productoPreciogActual.textContent = productoElegido.precio; //Cambiamos el precio del producto actual
        productoImgActual.src = productoElegido.colores[0].img; //Cambiamos la imagen del producto actual

        //Asignamos colores al producto elegido
        productoColoresActual.forEach((color, i) => { //Recorremos los colores del producto actual
            if (i < productoElegido.colores.length) { //Si el color existe
                color.style.backgroundColor = productoElegido.colores[i].code; //Cambiamos el color del botón
            } else color.style.display = "none"; //Si no existe, ocultamos el botón
        })
    });
});

productoColoresActual.forEach(function (color, i) { //Recorremos los colores del producto actual
    color.addEventListener("click", () => { //Añadimos un evento de click a cada color
        productoImgActual.src = productoElegido.colores[i].img; //Cambiamos la imagen del producto actual
    })
})

productoSizesActual.forEach(function (size, i) { //Recorremos las tallas del producto actual
    size.addEventListener("click", function () { //Añadimos un evento de click a cada talla
        productoSizesActual.forEach(function (size) { //Recorremos las tallas del producto actual
            size.style.backgroundColor = "white"; //Cambiamos el color de fondo de la talla
            size.style.color = "black"; //Cambiamos el color del texto de la talla
        })
        size.style.backgroundColor = "black"; //Cambiamos el color de fondo de la talla seleccionada
        size.style.color = "white"; //Cambiamos el color del texto de la talla seleccionada
    })
})

/*==================== Producto Seleccionado ====================*/

const AnadirCesta = document.querySelector("#AnadirCesta"); //Botón de añadir a la cesta
const productoSeleccionado = document.getElementById("productoSeleccionado"); //Producto seleccionado
const botonContinuarComprando = document.getElementById("botonContinuarComprando"); //Botón de continuar comprando
const realizarPago = document.getElementById("realizarPago"); //Botón de realizar pago

AnadirCesta.addEventListener("click", function () { //Añadimos un evento de click al botón de añadir a la cesta
    productoSeleccionado.style.display = "block"; //Mostramos el producto seleccionado
});

botonContinuarComprando.addEventListener("click", function () { //Añadimos un evento de click al botón de continuar comprando
    productoSeleccionado.style.display = "none"; //Ocultamos el producto seleccionado
});

/*==================== Iniciar sesión ====================*/

const iniciarSesion = document.getElementById('iniciarSesion'); //Botón de iniciar sesión
const iniciarSesionForm = document.getElementById('iniciarSesionForm'); //Formulario de inicio de sesión
const cerrarInicioSesion = document.querySelector('.cerrarInicioSesion'); //Botón de cerrar inicio de sesión

iniciarSesion.addEventListener('click', function () { //Añadimos un evento de click al botón de iniciar sesión
    iniciarSesionForm.style.display = 'block'; //Mostramos el formulario de inicio de sesión
});

cerrarInicioSesion.addEventListener('click', function () { //Añadimos un evento de click al botón de cerrar inicio de sesión
    iniciarSesionForm.style.display = 'none'; //Ocultamos el formulario de inicio de sesión
});