
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
    if ('correct' in quoteArr[quoteArr.length-1].classList) {
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
        e.preventDefault()
    })
    document.getElementById('guardar').addEventListener('mouseup', (e) =>{
        document.getElementById('form').submit()
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

})
renderQuote()
