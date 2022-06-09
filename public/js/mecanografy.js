
//Test mecanografía
const RANDOM_QUOTE_URL = "https://api.quotable.io/random?minLength=100&maxLength=200";
const text = document.getElementById('quote');
const input = document.getElementById('mecanografia');
const timerDiv = document.getElementById('timer');
const results = document.getElementById("resultados");

let correctChars = 0;
let incorrectChars = 0;
let timer;
let time = 60;
let lastResults;

function getRandomQuote(){
    return fetch(RANDOM_QUOTE_URL)
    .then(response => response.json())
    .then(data => data.content)
}

async function renderQuote(){
    const quote = await getRandomQuote()
    text.innerHTML = ''
    quote.split('').forEach(char => {
        const span = document.createElement('span')
        span.innerText = char
        text.appendChild(span)
    });
    input.value = null
}

//carga lo datos del local storge de los ultimos resultados y los muestra
function renderLastResulst(){
    lastResults = [];
    //optenemos datos de localstorage si hay
    if(localStorage.getItem('lastResults') !== null){
        const local = localStorage.getItem('lastResults').split(',');
        for (let dato of local) {
            lastResults.push(dato.split(';'))
        }
    }
    //creamos elementos para renderizar
    const resElement = document.getElementById('lastresults');
    resElement.innerHTML = '';
    lastResults.forEach(res => {
        const div = document.createElement('div');
        div.className = "barra p-2 rounded-md mb-2.5";
        const p = document.createElement('p');
        p.innerHTML =`Palabras/min: <span class="text-green-400">${(res[1]/5).toFixed(0)}</span>
        | Pulsaciones: <span class="text-green-400">${res[1]}/${res[0]}</span>
        | Precisión: <span class="text-green-400"> ${res[2]}%</span>`;
        div.appendChild(p);
        resElement.appendChild(div);
    })
}

input.addEventListener('input', () =>{
    const quoteArr = text.querySelectorAll('span')
    const valueArr = input.value.split('')
    quoteArr.forEach((span, index)=>{
        const char = valueArr[index]
        if(char === undefined){
            span.classList.remove('correct');
            span.classList.remove('incorrect');

        }
        else if(char === span.innerText){
            span.classList.add('correct');
            span.classList.remove('incorrect');
        }else{
            span.classList.remove('correct');
            span.classList.add('incorrect');
        }
    })
    function countResult(){
        //cuanta los puntos  da una nueva frase
        quoteArr.forEach((span)=>{
            if (span.classList.contains('correct')){
                correctChars++;
            }
            else if(span.classList.contains('incorrect')){
                incorrectChars++;
            }
        })
        renderQuote();
    }

    if (quoteArr[quoteArr.length-1].classList.contains('correct') || quoteArr[quoteArr.length-1].classList.contains('incorrect')) {
        countResult();
    }
    if(timer === undefined){
        timer = setInterval(() => {
            time--;
            timerDiv.innerText = time
            if (time === 0){
                clearInterval(timer);
                time=60;
                input.disabled = true;
                countResult();
                document.getElementById("bien").innerText = correctChars;
                document.getElementById("mal").innerText = incorrectChars;
                const total = correctChars + incorrectChars
                document.getElementById("total").innerText = total;
                if(document.getElementById("pulsaciones") !== null){
                    //if elementos que no estan cuando no estas logueado
                    document.getElementById("pulsaciones").value = total;
                }
                if(document.getElementById("correctas") !== null){
                    document.getElementById("correctas").value = correctChars;
                }
                const porcentaje = ((correctChars/total)*100).toFixed(2)
                document.getElementById("aciertos").innerText = porcentaje;
                //guardado para ultimos resultados
                if(lastResults.length > 5){
                    lastResults.shift();
                }
                for(i in lastResults){
                    //formate para guardar en local storage
                    lastResults[i] = lastResults[i].join(';')
                }
                lastResults.push(`${total};${correctChars};${porcentaje}`)
                localStorage.setItem('lastResults',lastResults)
                renderLastResulst();
                results.showModal();
            }
        },1000)
    }
})
document.getElementById('cerrar').addEventListener('click', (e) =>{
    e.preventDefault()
})
if(document.getElementById('guardar') !== null){//por que no esta cuando estas deslogueado
    document.getElementById('guardar').addEventListener('click', (e) =>{
        e.preventDefault();
    })
    document.getElementById('guardar').addEventListener('mouseup', (e) =>{
        document.getElementById('form').submit();
    })
}
document.getElementById('cerrar').addEventListener('mouseup', (e) =>{
    e.preventDefault()
    results.close()
    time = 60;
    timer = undefined;
    timerDiv.innerText = time;
    input.disabled = false;
    input.value = "";
    correctChars = 0;
    incorrectChars = 0;
})
renderQuote();
renderLastResulst();
