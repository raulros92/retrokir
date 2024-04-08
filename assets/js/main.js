/*==================== Slider====================*/

const slider = document.querySelector(".sliderContainer");
const menuObjetos = document.querySelectorAll(".menuObjeto");

menuObjetos.forEach(function (objeto, index) {
    objeto.addEventListener("click", function () {
        slider.style.transform = `translateX(${-100 * index}vw)`;
    });
});