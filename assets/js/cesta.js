/*==================== Cesta ====================*/

// Obtener los elementos de la cesta
const cesta = document.getElementById('cesta');
const basura1 = document.getElementById('basura1');
const basura2 = document.getElementById('basura2');
const vaciarCestaBtn = document.getElementById('vaciarCesta');
const comprarCestaBtn = document.getElementById('comprarCesta');
const precioTotal = document.getElementById('precioTotal');
const listaItems = document.querySelectorAll('ul li'); // Seleccionar todos los elementos li dentro de la lista

// Función para eliminar el primer elemento al hacer clic en basura1
basura1.addEventListener('click', function () {
    listaItems[0].remove(); // Eliminar el primer elemento de la lista
});

// Función para eliminar el segundo elemento al hacer clic en basura2
basura2.addEventListener('click', function () {
    listaItems[1].remove(); // Eliminar el segundo elemento de la lista
});

// Función para vaciar la cesta al hacer clic en vaciarCesta
vaciarCestaBtn.addEventListener('click', function () {
    // Iterar sobre todos los elementos li y eliminarlos
    listaItems.forEach(function (item) {
        item.remove();
    });
});

comprarCestaBtn.addEventListener('click', function () {
    cesta.style.display = "none";
});


/*==================== Pago ====================*/

const pago = document.querySelector(".pago");
const cerrarPago = document.querySelector(".cerrarPago");

comprarCestaBtn.addEventListener("click", function () {
    pago.style.display = "flex";
});

cerrarPago.addEventListener("click", () => {
    pago.style.display = "none";
});

/*==================== Compra realizada con exito ====================*/

const compraExito = document.querySelector(".compraExito");
const botonComprar = document.querySelector(".botonComprar");

botonComprar.addEventListener("click", function () {
    compraExito.style.display = "flex";

    // Realizar una solicitud AJAX para procesar las operaciones de SQL sin recargar la página
    const xhr = new XMLHttpRequest(); // Crear un objeto XMLHttpRequest
    xhr.open('GET', 'cesta.php?compra_con_exito=true', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText); // Verificar la respuesta del servidor en la consola
        }
    };
    xhr.send();
});

