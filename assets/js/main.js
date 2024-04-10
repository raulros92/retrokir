/*==================== Productos ====================*/


const productos = [
    {
        id: 1,
        title: "marioBros",
        price: "€19.95",
        colors: [
            {
                code: "invaderBlack",
                img: "assets/img/MarioBros.png",
            },
            {
                code: "stormGrey",
                img: "assets/img/MarioBrosStormGrey.png",
            },
        ],
    },
    {
        id: 2,
        title: "sonicSega",
        price: "€19.95",
        colors: [
            {
                code: "cristalBlue",
                img: "assets/img/SonicCristalBlue.png",
            },
            {
                code: "white",
                img: "assets/img/SonicWhite.png",
            },
        ],
    },
    {
        id: 3,
        title: "solidSnake",
        price: "€19.95",
        colors: [
            {
                code: "grey",
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
        title: "linkZelda",
        price: "€19.95",
        colors: [
            {
                code: "blue",
                img: "assets/img/LinkZelda.png",
            },
        ],
    },
    {
        id: 5,
        title: "kirbyAdventure",
        price: "€19.95",
        colors: [
            {
                code: "purple",
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

menuObjetos.forEach(function (objeto, index) {
    objeto.addEventListener("click", function () {
        //cambiar la diapositiva actual
        slider.style.transform = `translateX(${-100 * index}vw)`;

        //Cambiar el producto elegido
        productoElegido = productos[index];

        //Cambisr los textos del producto actual
        productoTituloActual.textContent = productoElegido.title;
        productoPreciogActual.textContent = productoElegido.price;
    });
});
