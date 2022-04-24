<x-app-layout>
    <div class="p-4">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>
    <div class="flex flex-col">
        <div class="flex">
            <div style="width: 35vw">
                <div class="barra p-2 m-2 ml-0" style="width: 35vw">
                    <h2>Inicio</h2>
                    <div class="barraroja" style="width: 35vw"></div>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore consequatur illum, mollitia distinctio odio quis harum modi. Sapiente, minima omnis. Sint molestias cumque iusto veritatis esse vel, similique vero necessitatibus?</p>
            </div>
            <div class="codigo p-2 ml-6" style="width: 44vw"></div>
        </div>
        <!--Pregunta a la comunidad-->
        <div class="flex flex-col mt-6">
            <div class="barra p-2 m-2 ml-0" style="width:78.5vw">
                <h2>Pregunta a la comunidad</h2>
                <div class="barraroja" style="width:78.5vw"></div>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore consequatur illum, mollitia distinctio odio quis harum modi. Sapiente, minima omnis. Sint molestias cumque iusto veritatis esse vel, similique vero necessitatibus?</p>

            <div class="flex mt-2">
                <div class="flex flex-col justify-center align-middle" style="width:15vw">
                    <h1 class="text-center">¡Hecha un vistazo!</h1>
                </div>
                <div class="codigo p-2 ml-6 " style="width: 65vw; min-height:30vh"></div>
            </div>
        </div>

         <!--Compruba tus habilidades-->
         <div class="flex flex-col mt-6">
            <div class="barra p-2 m-2 ml-0" style="width:78.5vw">
                <h2 >Compruba tus habilidades</h2>
                <div class="barraroja" style="width:78.5vw"></div>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore consequatur illum, mollitia distinctio odio quis harum modi. Sapiente, minima omnis. Sint molestias cumque iusto veritatis esse vel, similique vero necessitatibus?</p>

            <div class="flex mt-2">
                <div class="flex flex-col justify-center align-middle" style="width: 15vw">
                    <h1 class="text-center">¡Unete!</h1>
                </div>
                <div class="codigo p-2 ml-6" style="width: 65vw; min-height:30vh"></div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
