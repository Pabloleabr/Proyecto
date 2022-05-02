
//Test mecanografía
const RANDOM_QUOTE_URL = "https://api.quotable.io/random?minLength=100&maxLength=200";
const text = document.getElementById('quote');
const input = document.getElementById('mecanografia');
const timerDiv = document.getElementById('timer');

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
        if ('correct' in quoteArr[quoteArr.length-1].classList) {
            quoteArr.forEach((span)=>{
                if ('correct' in span.classList){
                    correctChars++;
                }
                else{
                    incorrectChars--;
                }

            })
            renderQuote();
        }
    }
    countResult();
    if(timer === undefined){
        timer = setInterval(() => {
            time--;
            timerDiv.innerText = time
            if (time === 0){
                clearInterval(timer);
                time=60;
                countResult();
                input.disabled = true;

            }
        },10)
    }
})


renderQuote()
