<nav x-data="{ open: false }" class="bg-white border-b dark:border-neutral-800 dark:bg-neutral-900">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    {{-- <a href="{{ route('dashboard') }}"> --}}
                        {{-- <x-jet-application-mark class="block w-auto h-9" /> --}}
                        <img class="w-10 h-10" src="data:image/png;base64,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">
                    {{-- </a> --}}
                    
                </div>
                
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('หน้าหลัก') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('announcement') }}" :active="request()->routeIs('announcement')">
                        {{ __('ข่าวสารและกิจกรรม') }}
                    </x-jet-nav-link>
                    {{-- <x-jet-nav-link href="{{ route('tableline') }}" :active="request()->routeIs('tableline')">
                        {{ __('Table Line') }}
                    </x-jet-nav-link> --}}
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="relative ml-3">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition bg-white border border-transparent rounded-md hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-jet-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-jet-dropdown-link>
                                    @endcan

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Team Switcher -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Switch Teams') }}
                                    </div>

                                    @foreach (Auth::user()->allTeams() as $team)
                                        <x-jet-switchable-team :team="$team" />
                                    @endforeach
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                @endif
                    <div class="ml-2 ">
                        <button type="button" x-bind:class="darkMode ? 'bg-neutral-500' : 'bg-gray-200'" x-on:click="darkMode = !darkMode"
                            class="relative inline-flex flex-shrink-0 h-6 transition-colors duration-200 ease-in-out border-2 border-transparent rounded-full cursor-pointer w-11 focus:outline-none focus:ring-0"
                            role="switch" aria-checked="false">
                            <span class="sr-only">Dark mode toggle</span>
                            <span x-bind:class="darkMode ? 'translate-x-5 bg-gray-700' : 'translate-x-0 bg-white'"
                                class="relative inline-block w-5 h-5 transition duration-200 ease-in-out transform rounded-full shadow pointer-events-none ring-0">
                                <span x-bind:class="darkMode ? 'opacity-0 ease-out duration-100' : 'opacity-100 ease-in duration-200'"
                                    class="absolute inset-0 flex items-center justify-center w-full h-full transition-opacity"
                                    aria-hidden="true ">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-gray-400" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                                    </svg>
                                </span>
                                <span x-bind:class="darkMode ?  'opacity-100 ease-in duration-200' : 'opacity-0 ease-out duration-100'"
                                    class="absolute inset-0 flex items-center justify-center w-full h-full transition-opacity"
                                    aria-hidden="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-white" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </span>
                        </button>
                    </div>
                <!-- Settings Dropdown -->
                <div class="relative ml-3 ">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm transition border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300">
                                    <img class="object-cover w-8 h-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400 ">
                                {{ __('Manage Account') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                         @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-jet-dropdown-link>
                            </form>
                            
                        </x-slot>
                    </x-jet-dropdown>
                </div>
            </div>
            
            <!-- Hamburger -->
            <div class="flex items-center -mr-2 sm:hidden">
                
                <div class="mr-2 ">
                    <button type="button" x-bind:class="darkMode ? 'bg-neutral-500' : 'bg-gray-200'" x-on:click="darkMode = !darkMode"
                        class="relative inline-flex flex-shrink-0 h-6 transition-colors duration-200 ease-in-out border-2 border-transparent rounded-full cursor-pointer w-11 focus:outline-none focus:ring-0"
                        role="switch" aria-checked="false">
                        <span class="sr-only">Dark mode toggle</span>
                        <span x-bind:class="darkMode ? 'translate-x-5 bg-gray-700' : 'translate-x-0 bg-white'"
                            class="relative inline-block w-5 h-5 transition duration-200 ease-in-out transform rounded-full shadow pointer-events-none ring-0">
                            <span x-bind:class="darkMode ? 'opacity-0 ease-out duration-100' : 'opacity-100 ease-in duration-200'"
                                class="absolute inset-0 flex items-center justify-center w-full h-full transition-opacity"
                                aria-hidden="true ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-gray-400" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                                </svg>
                            </span>
                            <span x-bind:class="darkMode ?  'opacity-100 ease-in duration-200' : 'opacity-0 ease-out duration-100'"
                                class="absolute inset-0 flex items-center justify-center w-full h-full transition-opacity"
                                aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-white" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    </button>
                </div>
                <button @click="open = ! open" 
                class="inline-flex items-center justify-center p-2 text-gray-400 transition rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 dark:bg-neutral-800 dark:text-neutral-600">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden ">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('หน้าหลัก') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('announcement') }}" :active="request()->routeIs('announcement')">
                {{ __('ข่าวสารและกิจกรรม') }}
            </x-jet-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-neutral-800">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="mr-3 shrink-0">
                        <img class="object-cover w-10 h-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="text-base font-medium text-gray-800 dark:text-neutral-300">{{ Auth::user()->name }}</div>
                    <div class="text-sm font-medium text-gray-500 dark:text-neutral-400">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                   @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-jet-responsive-nav-link>
                </form>

                <!-- Team Management -->
                {{-- @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-jet-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-jet-responsive-nav-link>
                    @endcan

                    <div class="border-t border-gray-200"></div>

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Teams') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                        <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                    @endforeach
                @endif --}}
            </div>
        </div>
    </div>
</nav>
