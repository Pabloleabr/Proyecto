<nav style="position:fixed; width:100vw" class="">
    <!-- Primary Navigation Menu -->
    <div class="">
        <div class="">
            <!-- header -->
            <div class="flex pt-2 w-max barra pl-2 pb-1 justify-between" style="width: 100vw; z-index:2">
                <!-- Logo -->
                <div class="flex">
                    <div id="hamburguesa" >
                        <div class="_layer -top"></div>
                        <div class="_layer -mid"></div>
                        <div class="_layer -bottom"></div>
                    </div>
                    <a class="w-10" href="{{ route('ver-ejercicios') }}" >
                        <img  src="{{ URL::to('/') }}/img/logo.png" alt="logo del sitio web">
                    </a>
                    <h1 class="pl-2" style="font-size: 1.7rem !important">
                        PreguntasPro
                    </h1>
                </div>
                <!--login-->
                <div class="flex p-2 mr-4">
                    @if (empty(Auth::user()))
                        @if (Route::has('login'))
                            <div class="">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="pl-2">Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}" class="pl-2">Log in</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="pl-2">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    @else
                        <div class="flex sm:items-center sm:ml-6" style="border-style: none">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="flex transition duration-150 ease-in-ouflex items-center ">
                                        {{ Auth::user()->name }}


                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>

                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>

                        <!-- Hamburger -->


                    @endif
                </div>


            </div>
            <!--navbar-->
            <nav id="nav" class="">
                <x-nav-link :href="route('inicio')" :active="request()->routeIs('inicio')">
                    Inicio
                </x-nav-link>
                <div class="separador"></div>
                <!--Dashboard-->
                @if (!empty(Auth::user()))
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    <i class="fa fa-home" aria-hidden="true" style="font-size: 20px"></i>
                     {{ __('Dashboard') }}
                </x-nav-link>
                <div class="separador"></div>
                @endif

                <x-nav-link :href="route('ver-ejercicios')" :active="request()->routeIs('ver-ejercicios')">
                    <i class="fa fa-code" aria-hidden="true" style="font-size: 20px"></i>
                     Ejercicios
                </x-nav-link>
                @if (!empty(Auth::user()))
                    <x-nav-link :href="route('crear-ejer')" :active="request()->routeIs('crear-ejer')">
                    <i class="fa fa-plus-square" aria-hidden="true" style="font-size: 20px"></i>
                         Crear Ejercicio
                    </x-nav-link>
                @endif
                <div class="separador"></div>

                <x-nav-link :href="route('ver-preguntas')" :active="request()->routeIs('ver-preguntas')">
                    <i class="fa fa-question-circle" aria-hidden="true" style="font-size: 20px"></i>
                     Preguntas
                </x-nav-link>
                @if (!empty(Auth::user()))
                    <x-nav-link :href="route('crear-pregunta')" :active="request()->routeIs('crear-pregunta')">
                        <i class="fa fa-question-circle-o" aria-hidden="true" style="font-size: 20px"></i>
                         Hacer Preguntas
                    </x-nav-link>
                @endif
                <div class="separador"></div>
                <x-nav-link :href="route('test-mecano')" :active="request()->routeIs('test-mecano')">
                    <i class="fa fa-keyboard-o" aria-hidden="true" style="font-size: 20px"></i>
                     Test Mecanografía
                </x-nav-link>


                </nav>

            <!-- Settings Dropdown -->
        </div>
    </div>
    @if (!empty(Auth::user()))
        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    @endif
</nav>
