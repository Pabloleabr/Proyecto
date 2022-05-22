const brara =document.getElementById("busquedarara");
const nav = document.getElementById("nav");

function toggleMenu() {

    nav.classList.toggle("is-active");
    document.getElementById("main").classList.toggle("is-active");
    if(brara !== null){
        brara.classList.toggle("is-active");
    }

}
//para arreglar bug raro que pasa que se le uita la clase al escribir
if(brara !== null){
    brara.addEventListener('keyup',()=>{
        if (nav.classList.contains("is-active")) {
            setTimeout(()=>brara.classList.add("is-active"),300);
        }
    })
}
var menu = document.querySelector('#hamburguesa');
toggleMenu(); //para que empiece cerrado
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

//-----form code-------

const titulo = document.getElementById("titulo");
const descripcion = document.getElementById("descripcion");
const form = document.forms[0];

//solo ejecutamos el codigo si hay unform en esta página
if(form !== undefined){

    /**
     * funcion generadora para crear los validar con mensajes diferentes
     *  @param string Mensaje de error
     *  @returns function
     */
    function crearValidador(mensajeError){
        function validar(){
            if(!this.checkValidity()){
                if(this.validity.valueMissing){
                    this.setCustomValidity("Debes introducir un valor");
                }
                if (this.validity.patternMismatch){
                    this.setCustomValidity(mensajeError);
                    }
                this.reportValidity();
            }
            borrarError();
            //al final por que si iba al principio se me quedaba el mensaje escribiendo
        }
        return validar;
    }

    /**
     * borra los mensajes de error para que no sigan reapareciendo en cada evento
     * @returns void
     */
    function borrarError(){
        descripcion.setCustomValidity("");
        titulo.setCustomValidity("");
    }

    //asignao de mensaje para cada input
    var validar = crearValidador("Valor no valido para patron permitido");
    if(titulo != undefined){//por que con haber titulo hay descripcion
        titulo.addEventListener('focusout', validar);
        descripcion.addEventListener('focusout', validar);
    }

}

//animacion creadaditos al iniciar
let currentSqNum = 1;
function createSquare(){
    let div = document.createElement("div");
    let dimesiones = Math.random().toFixed(2) * 50;
    div.className = `backSquare sqAnim--${currentSqNum}`
    div.style = `
                width: ${dimesiones}px;
                height: ${dimesiones}px;
                top: ${Math.random().toFixed(3) * document.documentElement.scrollHeight}px;
                left: ${Math.random().toFixed(3) * document.documentElement.scrollWidth}px;
                `
    document.getElementById("main").appendChild(div);
}
sqTimer = setInterval(()=>{
    createSquare();
    currentSqNum++;
    if(currentSqNum == 21){
        clearInterval(sqTimer);
    }
}, 200);
