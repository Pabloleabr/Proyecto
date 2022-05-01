function toggleMenu() {

    document.getElementById("nav").classList.toggle("is-active");
    document.getElementById("main").classList.toggle("is-active");
    document.getElementById("busquedarara").classList.toggle("is-active");


    this.classList.toggle('is-active');
}
var menu = document.querySelector('#hamburguesa');

//añadimos la funcion al evento click del menu hamburguesa
menu.addEventListener('click', toggleMenu);


//apaño crudo para arreglar z-index de buscadores
window.addEventListener('scroll', function (e){
    const scroll_pos = window.scrollY
    if ( scroll_pos > 15){//una vez pasa esta posicion se camia el z-index para que no este por encima
        this.document.getElementById('busquedarara').style = "z-index: -1;"
    }
    else{
        this.document.getElementById('busquedarara').style = "z-index: 0;"

    }
})
