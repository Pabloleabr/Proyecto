
const nav = document.getElementById("nav");
const br = document.getElementById('busquedarara')
const b = document.getElementById('busqueda')
const bp = document.getElementById('busquedaPre')

function toggleMenu() {

    nav.classList.toggle("is-active");
    document.getElementById("main").classList.toggle("is-active");
    if(br !== null){
        br.classList.toggle("is-active");
    }
    if(b !== null){
        b.classList.toggle("is-active");
    }
    if(bp !== null){
        bp.classList.toggle("is-active");
    }


}
//para arreglar bug raro que pasa que se le uita la clase al escribi
function reajusteBusca(){
    if (br !== null) {
        if (nav.classList.contains("is-active")) {
            setTimeout(()=>br.classList.add("is-active"),300);
        }
    }
}
if(br !== null){
    br.addEventListener('keyup',()=>{
        reajusteBusca();
    })
}
var menu = document.querySelector('#hamburguesa');
toggleMenu(); //para que empiece cerrado
//añadimos la funcion al evento click del menu hamburguesa
menu.addEventListener('click', toggleMenu);


//apaño crudo para arreglar z-index de buscadores
window.addEventListener('scroll', function (e){
    const scroll_pos = window.scrollY



    if ( scroll_pos > 15){//una vez pasa esta posicion se camia el z-index para que no este por encima
        if(b != null) {b.style.zIndex = "-1"}
        if(br != null) {br.style.zIndex ="-1"}
        if(bp != null) {bp.style.zIndex = "-1"}


    }
    else{
        if(b != null) {b.style.zIndex = "0"}
        if(br != null) {br.style.zIndex ="0"}
        if(bp != null) {bp.style.zIndex = "0"}

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


//sistema de puntuación
const levels = [
    "Begginer",
    "Expirienced",
    "Master",
    "Pro",
]
const medals = [
    `<div class="border-2 rounded-3xl p-2 border-green-500 text-xs text-green-300 font-semibold" style="background-color: rgba(143, 250, 143, 0.301); border-color: rgb(34 197 94);">
            Begginer
        </div>`,
        `<div class="border-2 rounded-3xl p-2 border-blue-500 text-xs text-blue-400 font-semibold" style="background-color: rgba(143, 202, 250, 0.301); border-color: rgb(59 130 246);">
        Expirienced
        </div>`,
        `<div class="border-2 rounded-3xl p-2 border-violet-500 text-xs text-violet-400 font-semibold" style="background-color: rgba(180, 143, 250, 0.301); border-color: rgb(139 92 246);">
        Master
        </div>`,
        `<div class="border-2 rounded-3xl p-2 border-red-500 text-xs text-red-400 font-semibold" style="background-color: rgba(250, 143, 143, 0.301); border-color: rgb(239 68 68);">
            Pro
        </div>`
    ]
const puntos = document.getElementById('points') != null ? document.getElementById('points').innerText : null;
const next = document.getElementById('next');
const current = document.getElementById('current');
const pointBar = document.getElementById('pointsBar');
let level;
if(puntos != null){//si no esta uno no esta ninguno de los otros ya que son de la misma pagina
    const calc = Math.min(Math.floor(puntos/100),levels.length);const next = document.getElementById('next');
    level = levels[calc];
    localStorage.setItem('level',level);
    current.innerHTML += medals[calc];
    current.innerHTML += `${medals[Math.min(calc+1,levels.length)]}`;
    pointBar.style.width = level == levels[3] ? "100%" : `${puntos%100}%`;
}
const localNi = localStorage.getItem('level');
if(localNi != null){
    level = localNi;
}else{
    level = levels[0]
}


