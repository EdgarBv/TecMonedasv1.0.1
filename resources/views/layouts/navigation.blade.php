<nav x-data="{ open: false }" style="background-color: rgb(0 12 66); border: none;">
    <!-- Primary Navigation Menu -->
    <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Navigation Links -->
                <div class="p-1 m-2 inline-flex items-center fixed top-0" style="z-index: 999;">
                    <div class="hamburger-icon" id="icon">
                        <div class="icon-1" id="a"></div>
                        <div class="icon-2" id="b"></div>
                        <div class="icon-3" id="c"></div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="sm:ml-6 flex items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex items-center text-sm font-medium text-white hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    
                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Cerrar sesión') }}
                            </x-dropdown-link>
                        </form>
                        <form action="{{ route('perfil') }}">
                            @csrf

                            <x-dropdown-link :href="route('perfil')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Perfil') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>