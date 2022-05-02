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
    const br =this.document.getElementById('busquedarara')
    const b =this.document.getElementById('busqueda')

    if ( scroll_pos > 15){//una vez pasa esta posicion se camia el z-index para que no este por encima
        if(b != null) {b.style = "z-index: -1;"}
        if(br != null) {br.style = "z-index: -1;"}

    }
    else{
        if(b != null) {b.style = "z-index: 0;"}
        if(br != null) {br.style = "z-index: 0;"}

    }
})

//Test mecanografía
const RANDOM_QUOTE_URL = "https://api.quotable.io/random?minLength=100"

function getRandomQuote(){
    return fetch(RANDOM_QUOTE_URL)
    .then(response => response.json())
    .then(data => data.content)
}

async function renderQuote(){
    const quote = await getRandomQuote()
}
