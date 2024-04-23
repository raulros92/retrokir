/*==================== Productos ====================*/


const productos = [
    {
        id: 1,
        titulo: "Mario Bros",
        precio: "€19.95",
        colores: [
            {
                code: "#010E21",
                img: "assets/img/MarioBros.png",
            },
            {
                code: "#5C5C5C",
                img: "assets/img/MarioBrosStormGrey.png",
            },
        ],
    },
    {
        id: 2,
        titulo: "Sonic Sega",
        precio: "€19.95",
        colores: [
            {
                code: "#B1D5ED",
                img: "assets/img/SonicCristalBlue.png",
            },
            {
                code: "#FFFFFF",
                img: "assets/img/SonicWhite.png",
            },
        ],
    },
    {
        id: 3,
        titulo: "Solid Snake",
        precio: "€19.95",
        colores: [
            {
                code: "#AFAAAE",
                img: "assets/img/SolidSnake.png",
            },
            {
                code: "white",
                img: "assets/img/SnakeWhite.png",
            },
        ],
    },
    {
        id: 4,
        titulo: "Link Zelda",
        precio: "€19.95",
        colores: [
            {
                code: "#3D6DB7",
                img: "assets/img/LinkZelda.png",
            },
        ],
    },
    {
        id: 5,
        titulo: "Kirby",
        precio: "€19.95",
        colores: [
            {
                code: "#6B65A3",
                img: "assets/img/KirbyAdventure.png",
            },
        ],
    },
];

/*==================== Slider ====================*/

const slider = document.querySelector(".sliderContainer");
const menuObjetos = document.querySelectorAll(".menuObjeto");

let productoElegido = productos[0]

const productoImgActual = document.querySelector(".productoImg");
const productoTituloActual = document.querySelector(".productoTitulo");
const productoPreciogActual = document.querySelector(".productoPrecio");
const productoColoresActual = document.querySelectorAll(".color");
const productoSizesActual = document.querySelectorAll(".size");

menuObjetos.forEach(function (objeto, i) {
    objeto.addEventListener("click", function () {
        //cambiar la diapositiva actual
        slider.style.transform = `translateX(${-100 * i}vw)`;

        //Cambiar el producto elegido
        productoElegido = productos[i];

        //Cambiar los datos del producto actual
        productoTituloActual.textContent = productoElegido.titulo;
        productoPreciogActual.textContent = productoElegido.precio;
        productoImgActual.src = productoElegido.colores[0].img

        //Asignamos colores al producto elegido
        productoColoresActual.forEach((color, i) => {
            if (i < productoElegido.colores.length) {
                color.style.backgroundColor = productoElegido.colores[i].code;
            } else color.style.display = "none";
        })
    });
});

productoColoresActual.forEach(function (color, i) {
    color.addEventListener("click", () => {
        productoImgActual.src = productoElegido.colores[i].img;
    })
})

productoSizesActual.forEach(function (size, i) {
    size.addEventListener("click", function () {
        productoSizesActual.forEach(function (size) {
            size.style.backgroundColor = "white";
            size.style.color = "black";
        })
        size.style.backgroundColor = "black";
        size.style.color = "white";
    })
})

/*==================== Producto Seleccionado ====================*/


const botonProducto = document.querySelector(".botonProducto");
const productoSeleccionado = document.getElementById("productoSeleccionado");
const botonContinuarComprando = document.getElementById("botonContinuarComprando");
const realizarPago = document.getElementById("realizarPago");

botonProducto.addEventListener("click", function () {
    productoSeleccionado.style.display = "block";
});

botonContinuarComprando.addEventListener("click", function () {
    productoSeleccionado.style.display = "none";
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
