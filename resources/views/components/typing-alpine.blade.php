@props(['text'])

<div class=" mx-auto" x-data='{
    text: "",
    textArray: ["print(\"Hola\")<br>console.log(\"Bien venido\")<br>echo(\"a PreguntasPro\")<br>"],
    textIndex: 0,
    charIndex: 0,
    pauseEnd: 1500,
    cursorSpeed: 420,
    pauseStart: 20,
    typeSpeed: 150,
    direction: "forward"
}' x-init="(() => {

    let typingInterval = setInterval(startTyping, $data.typeSpeed);

    function startTyping() {
        let current = $data.textArray[$data.textIndex];
        if ($data.charIndex > current.length) {
            $data.direction = 'backward';
            clearInterval(typingInterval);
            setTimeout(function() {
                typingInterval = setInterval(startTyping, $data.typeSpeed);
            }, $data.pauseEnd);
        }

        $data.text = current.substring(0, $data.charIndex);
        if ($data.direction == 'forward') {
            $data.charIndex += 1;
        } else {
            if ($data.charIndex == 0) {
                $data.direction = 'forward';
                clearInterval(typingInterval);
                setTimeout(function() {

                    $data.textIndex += 1;
                    if ($data.textIndex >= $data.textArray.length) {
                        $data.textIndex = 0;
                    }

                    typingInterval = setInterval(startTyping, $data.typeSpeed);
                }, $data.pauseStart);
            }
            $data.charIndex -= 1;
        }

    }

    setInterval(function() {
        if ($refs.cursor.classList.contains('hidden')) {
            $refs.cursor.classList.remove('hidden');
        } else {
            $refs.cursor.classList.add('hidden');
        }
    }, $data.cursorSpeed);
})()">
    <div class="relative h-auto">
        <h1 class="text-xl font-black" x-html="text"></h1>
        <span class="h-full w-5 -mr-8 bg-white" x-ref="cursor">
    </div>
</div>
</div>
