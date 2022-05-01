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
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore consequatur illum, mollitia distinctio odio quis harum modi. Sapiente, minima omnis. Sint molestias cumque iusto veritatis esse vel, similique vero necessitatibus?</p>
            </div>
            <div class="codigo p-2 sm:ml-6" style=""></div>
        </div>
        <!--Pregunta a la comunidad-->
        <div class="flex flex-col mt-6">
            <div class="barra p-2 m-2 ml-0" style="">
                <h2>Pregunta a la comunidad</h2>
            </div>
            <div class="barraroja" style=""></div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore consequatur illum, mollitia distinctio odio quis harum modi. Sapiente, minima omnis. Sint molestias cumque iusto veritatis esse vel, similique vero necessitatibus?</p>

            <div class="flex mt-2">
                <div class="flex flex-col justify-center align-middle hide" style="width:15vw">
                    <h1 class="text-center">¡Hecha un vistazo!</h1>
                </div>
                <div class="codigo p-2 sm:ml-6 " style=" min-height:30vh"></div>
            </div>
        </div>

         <!--Compruba tus habilidades-->
         <div class="flex flex-col mt-6">
            <div class="barra p-2 m-2 ml-0" style="">
                <h2 >Compruba tus habilidades</h2>
            </div>
            <div class="barraroja" style=""></div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore consequatur illum, mollitia distinctio odio quis harum modi. Sapiente, minima omnis. Sint molestias cumque iusto veritatis esse vel, similique vero necessitatibus?</p>

            <div class="flex mt-2">
                <div class="flex flex-col justify-center align-middle hide" style="width: 15vw">
                    <h1 class="text-center">¡Unete!</h1>
                </div>
                <div class="codigo p-2 sm:ml-6" style="width: 100%; min-height:30vh"></div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
