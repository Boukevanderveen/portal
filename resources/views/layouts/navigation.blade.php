<nav x-data="{ open: false }" class="fixed w-full bg-[#2f4443] border-b border-gray-100 ">    
    <!-- Primary Navigation Menu -->
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a class="w-20" href="{{ route('index') }}">
                        <img src="{{ asset('/logo/firda_logo_wit.png') }}"> 
                    </a>
                
                </div>

              
                @if(!Route::is('login') )
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex ">
                    <x-nav-link :href="route('index')" :active="request()->routeIs('index')">
                        <span class="text-white">Home</span>
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('websites.index')" :active="request()->routeIs('websites.*')">
                        <span class="text-white">Websites</span>
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('tests.index')" :active="request()->routeIs('tests.*')">
                        <span class="text-white">Toetsen</span>
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('subjects.index')" :active="request()->routeIs('subjects.*')">
                        <span class="text-white">Vakken</span>
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('trips.index')" :active="request()->routeIs('trips.*')">
                        <span class="text-white">Uitjes</span>
                    </x-nav-link>
                </div>
                
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('electives.index')" :active="request()->routeIs('electives.*')">
                        <span class="text-white">Keuzedelen</span>
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('books.index')" :active="request()->routeIs('books.*')">
                        <span class="text-white">Boeken</span>
                    </x-nav-link>
                </div>
                
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('projects.index')" :active="request()->routeIs('projects.*')">
                        <span class="text-white">Projecten</span>
                    </x-nav-link>
                </div>
            @endif
            </div>

            @if(!Route::is('login') )
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @auth
                    @if(Auth::User()->isAdmin)
                    <x-nav-link :href="route('admin.index')" :active="request()->routeIs('admin')">
                        <span class="text-white">Admin</span>
                    </x-nav-link>
                    @endif
                    @endauth
                </div>

                @guest
                <x-nav-link :href="route('login')">
                        <span class="text-white">Inloggen</span>
                </x-nav-link>
                @endguest

                @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div class="text-white">{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        


                        <x-dropdown-link :href="route('admin.index')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('websites.personal')">
                            {{ __('Mijn websites') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Uitloggen') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                @endauth
            </div>
            @endif

            @if(!Route::is('login') )
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

    @if(!Route::is('login') )
    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open} " class="position-absolute z-1 hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link class="text-white" :href="route('index')" :active="request()->routeIs('index')">
                Home
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link class="text-white" :href="route('websites.index')" :active="request()->routeIs('websites.index')">
                Websites
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link class="text-white" :href="route('tests.index')" :active="request()->routeIs('tests.index')">
                Toetsen
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link class="text-white" :href="route('subjects.index')" :active="request()->routeIs('subjects.index')">
                Vakken
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link class="text-white" :href="route('electives.index')" :active="request()->routeIs('electives.index')">
                Keuzedelen
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link class="text-white" :href="route('books.index')" :active="request()->routeIs('books.index')">
                Boeken
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link class="text-white" :href="route('projects.index')" :active="request()->routeIs('projects.index')">
                Projecten
            </x-responsive-nav-link>
        </div>
        @auth
        @if(Auth::User()->isAdmin)
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link class="text-white" :href="route('admin.index')" :active="request()->routeIs('admin.index')">
                Admin
            </x-responsive-nav-link>
        </div>
        @endif
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-responsive-nav-link class="text-white"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                Uitloggen
            </x-responsive-nav-link>
        </form>
        @endauth
        @guest
            <x-responsive-nav-link :href="route('login')" class="text-white mb-2">
                Inloggen
            </x-responsive-nav-link>
        @endguest
        <!-- Responsive Settings Options -->
        @auth
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-white">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">

                <x-responsive-nav-link :href="route('websites.personal')" class="text-white"
                >
                    Mijn websites
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" class="text-white"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        Uitloggen
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
        @endauth
    </div>
    @endif
</nav>
