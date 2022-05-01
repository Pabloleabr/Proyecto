function toggleMenu() {

    document.getElementById("nav").classList.toggle("is-active");
    document.getElementById("main").classList.toggle("is-active");
    document.getElementById("busquedarara").classList.toggle("is-active");


    this.classList.toggle('is-active');
}
var menu = document.querySelector('#hamburguesa');

//añadimos la funcion al evento click del menu hamburguesa
menu.addEventListener('click', toggleMenu);
