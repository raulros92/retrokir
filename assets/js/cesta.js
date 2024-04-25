/*==================== Cesta ====================*/

// Obtener los elementos de los botones y los elementos li
const basura1 = document.getElementById('basura1');
const basura2 = document.getElementById('basura2');
const vaciarCestaBtn = document.getElementById('vaciarCesta');
const comprarCestaBtn = document.getElementById('comprarCesta');
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
    console.log("Compra realizada");
});


/*==================== Pago ====================*/

// const botonProducto = document.querySelector(".botonProducto");
// const pago = document.querySelector(".pago");
// const cerrar = document.querySelector(".cerrar");

// botonProducto.addEventListener("click", function () {
//     pago.style.display = "flex";
// })

// cerrar.addEventListener("click", () => {
//     pago.style.display = "none";
// })