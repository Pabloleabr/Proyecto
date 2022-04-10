<nav style="position:fixed; width:100vw" class="">
    <!-- Primary Navigation Menu -->
    <div class="">
        <div class="">
            <!-- header -->
            <div class="flex pt-2 w-max barra pl-2 pb-1 justify-between" style="width: 100vw">
                <!-- Logo -->
                <div class="flex">
                    <a class="w-10" href="{{ route('ver-ejercicios') }}">
                        <img width="100%" src="{{URL::to('/')}}/img/logo.png" alt="logo del sitio web">
                    </a>
                    <h2 class="p-2">
                        PreguntasPro
                    </h2>
                </div>
                <!--login-->
                <div class="flex p-2 ">
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
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="flex transition duration-150 ease-in-ouflex items-center ">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>

                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                @endif
            </div>


            </div>
            <!--navbar-->
            <div id="nav" class="">

                    <x-nav-link :href="route('ver-ejercicios')" :active="request()->routeIs('ver-ejercicios')">
                        Ejercicios
                    </x-nav-link>


                @if (!empty(Auth::user()))
                <!--Navigation Links for users-->

                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>




                    <x-nav-link :href="route('crear-ejer')" :active="request()->routeIs('crear-ejer')">
                        Crear Ejercicio
                    </x-nav-link>


                @endif
            </div>

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

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>

    @endif
</nav>
