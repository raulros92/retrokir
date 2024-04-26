/*==================== Cesta ====================*/

// Obtener los elementos de la cesta
const cesta = document.getElementById('cesta'); // Obtener el elemento cesta
const basura1 = document.getElementById('basura1'); // Obtener el elemento basura1
const basura2 = document.getElementById('basura2'); // Obtener el elemento basura2
const vaciarCestaBtn = document.getElementById('vaciarCesta'); // Obtener el botón vaciarCesta
const comprarCestaBtn = document.getElementById('comprarCesta'); // Obtener el botón comprarCesta
const precioTotal = document.getElementById('precioTotal'); // Obtener el elemento precioTotal
const listaItems = document.querySelectorAll('ul li'); // Seleccionar todos los elementos li dentro de la lista

// Función para eliminar el primer elemento al hacer clic en basura1
basura1.addEventListener('click', function () {
    listaItems[0].remove(); // Eliminar el primer elemento de la lista
    // Obtener el precio del artículo eliminado
    const precioProducto = parseFloat(listaItems[0].querySelector('p').textContent.split(' ')[1]);
    // Restar el precio del artículo eliminado del precio total
    const precioTotalNumerico = parseFloat(precioTotal.textContent.split(' ')[1]);
    const nuevoPrecioTotal = precioTotalNumerico - precioProducto;
    // Actualizar el precio total en la interfaz de usuario
    precioTotal.textContent = 'Total: €' + nuevoPrecioTotal.toFixed(2);
});

// Función para eliminar el segundo elemento al hacer clic en basura2
basura2.addEventListener('click', function () {
    listaItems[1].remove(); // Eliminar el segundo elemento de la lista
    // Obtener el precio del artículo eliminado
    const precioProducto = parseFloat(listaItems[1].querySelector('p').textContent.split(' ')[1]);
    // Restar el precio del artículo eliminado del precio total
    const precioTotalNumerico = parseFloat(precioTotal.textContent.split(' ')[1]);
    const nuevoPrecioTotal = precioTotalNumerico - precioProducto;
    // Actualizar el precio total en la interfaz de usuario
    precioTotal.textContent = 'Total: €' + nuevoPrecioTotal.toFixed(2);
});

// Función para vaciar la cesta al hacer clic en vaciarCesta
vaciarCestaBtn.addEventListener('click', function () {
    // Iterar sobre todos los elementos li y eliminarlos
    listaItems.forEach(function (item) {
        item.remove();
    });
});

// Función para comprar la cesta al hacer clic en comprarCesta
comprarCestaBtn.addEventListener('click', function () {
    cesta.style.display = "none";
});


/*==================== Pago ====================*/

const pago = document.querySelector(".pago"); // Obtener el elemento pago
const cerrarPago = document.querySelector(".cerrarPago"); // Obtener el botón cerrarPago

comprarCestaBtn.addEventListener("click", function () { // Añadir un evento de clic al botón comprarCesta
    pago.style.display = "flex"; // Mostrar el elemento pago
});

cerrarPago.addEventListener("click", () => { // Añadir un evento de clic al botón cerrarPago
    pago.style.display = "none"; // Ocultar el elemento pago
});

/*==================== Compra realizada con exito ====================*/

const compraExito = document.querySelector(".compraExito"); // Obtener el elemento compraExito
const botonComprar = document.querySelector(".botonComprar"); // Obtener el botón botonComprar

botonComprar.addEventListener("click", function () { // Añadir un evento de clic al botón botonComprar
    compraExito.style.display = "flex"; // Mostrar el elemento compraExito

    // Realizar una solicitud AJAX para procesar las operaciones de SQL
    const xhr = new XMLHttpRequest(); // Crear una nueva instancia de XMLHttpRequest
    xhr.open('GET', 'cesta.php?compra_con_exito=true', true); // Inicializar una solicitud GET a cesta.php
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText); // Verificar la respuesta del servidor en la consola
        }
    };
    xhr.send(); // Enviar la solicitud
});

