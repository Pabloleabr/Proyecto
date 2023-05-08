<x-app-layout>
    <div class="p-4">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </x-slot>
        <div class="flex flex-col">
            <div class="mi-flex">
                <div class="ms:w-2/12">
                    <div class="barra p-2 m-2 ml-0" style="">
                        <h2>Inicio</h2>
                    </div>
                    <div class="barraroja" style=""></div>
                    <p>Bienvenido a la página de PreguntasPro, donde podrás tanto preguntar sobre asuntos de
                        programación, como ejercitar tus habilidades de desarrollador.</p>
                </div>
                <div class="codigo p-4 sm:ml-6" style=" min-height:16vh">
                    <div class=" mx-auto" x-data='{
                    text: "",
                    textArray: ["print(\"Hola\")<br>console.log(\"Bienvenido\")<br>echo(\"a PreguntasPro\")<br>"],
                    textIndex: 0,
                    charIndex: 0,
                    pauseEnd: 5000,
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


                })()">
                        <div class=" h-auto">
                            <h1 class="text-xl font-black" x-html="text"></h1>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Pregunta a la comunidad-->
        <div class="flex flex-col mt-6">
            <div class="barra p-2 m-2 ml-0" style="">
                <h2>Pregunta a la comunidad</h2>
            </div>
            <div class="barraroja" style=""></div>
            <p>En esta páginas puedes preguntar cualquier duda que tengas de programación o desarrollo de una aplicación
                web, además de poder observar las preguntas y respuestas de todos los otros usuarios.</p>

            <div class="flex mt-2">
                <div class="flex flex-col justify-center align-middle hide" style="width:15vw">
                    <h1 class="text-center"><a href="{{ route('ver-preguntas') }}">¡Echa un vistazo!</a></h1>
                </div>
                <div class="codigo p-4 sm:ml-6" style=" min-height:16vh">
                    <div class=" mx-auto" x-data='{
                        text: "",
                        textArray: ["input(\"¿Alguna duda?\")<br>confirm(\"¿Interesado?\")<br>readline(\"¿Listo?\")<br>"],
                        textIndex: 0,
                        charIndex: 0,
                        pauseEnd: 5000,
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


                    })()">
                        <div class=" h-auto">
                            <h1 class="text-xl font-black" x-html="text"></h1>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Compruba tus habilidades-->
        <div class="flex flex-col mt-6">
            <div class="barra p-2 m-2 ml-0" style="">
                <h2>Compruba tus habilidades</h2>
            </div>
            <div class="barraroja" style=""></div>
            <p>En esta página tambien podrás ejercitar tus habilidades de programación y desarrollor, haciendo ejercicios
                creados por otros usuarios y viendo las
                repuestas de todos, mejorando poco a poco y aprendiendo todos juntos.</p>

            <div class="flex mt-2">
                <div class="flex flex-col justify-center align-middle hide" style="width: 15vw">
                    <h1 class="text-center"><a href="{{ route('ver-ejercicios') }}">¡Únete!</a></h1>
                </div>
                <div class="codigo p-4 sm:ml-6" style=" min-height:16vh">
                    <div class=" mx-auto" x-data='{
                           text: "",
                           textArray: ["for(u in PreguntasPro)<br>&emsp;mejoras++<br>return HechoUnPro<br>"],
                           textIndex: 0,
                           charIndex: 0,
                           pauseEnd: 5000,
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


                       })()">
                        <div class=" h-auto">
                            <h1 class="text-xl font-black" x-html="text"></h1>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    </div>
    </div>

</x-app-layout>
