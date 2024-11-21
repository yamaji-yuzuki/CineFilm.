<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                
                <!-- Logo --> 
                <div class="shrink-0 flex items-center">
                    <!--<a href="{{ route('dashboard') }}">-->
                            <img src="https://www.videogamesprites.net/SuperMarioBros1/Characters/Mario/Mario%20-%20Dead.gif">
                <!--        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />-->
                    <!--</a>-->
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Movies') }}
                    </x-nav-link>
                    <x-nav-link :href="route('community')" :active="request()->routeIs('community')">
                        {{ __('Communities') }}
                    </x-nav-link>
                </div>
            </div>
            
            <!-- Marioのアニメーション部分 -->
        <!--    <div class="relative z-10">-->
        <!--        <style>-->
        <!--            html, body {-->
        <!--                font-family: 'Press Start 2P', cursive;-->
        <!--                margin: 0;-->
        <!--                padding: 0;-->
        <!--                overflow: hidden;-->
        <!--            }-->
        <!--            .sky, .ground {-->
        <!--                position: relative;-->
        <!--            }-->
        <!--            .sky {-->
        <!--                height: 200px;-->
        <!--                background-color: #548CFF;-->
        <!--                overflow: hidden;-->
        <!--            }-->
        <!--            .ground {-->
        <!--                height: 40px;-->
        <!--                background-color: #C84C0C;-->
        <!--                background-image: url('https://raw.githubusercontent.com/LantareCode/random-this-and-thats/master/CSS/SuperMario-Animation/images/groundblock.png');-->
        <!--            }-->
        <!--            .scorebar {-->
        <!--                position: absolute;-->
        <!--                height: 50px;-->
        <!--                width: 100%;-->
        <!--                font-size: 14px;-->
        <!--                color: white;-->
        <!--                padding: 10px;-->
        <!--                line-height: 1;-->
        <!--            }-->
        <!--            .cloud {-->
        <!--                position: absolute;-->
        <!--                height: 50px;-->
        <!--                animation: wind 30s infinite linear;-->
        <!--            }-->
        <!--            .cloud:nth-child(2) {-->
        <!--                top: 30px;-->
        <!--                animation-duration: 40s;-->
        <!--            }-->
        <!--            .cloud:nth-child(3) {-->
        <!--                top: 60px;-->
        <!--                animation-duration: 60s;-->
        <!--            }-->
        <!--            .mario {-->
        <!--                position: absolute;-->
        <!--                width: 71px;-->
        <!--                height: 72px;-->
        <!--                background: url('https://raw.githubusercontent.com/LantareCode/random-this-and-thats/master/CSS/SuperMario-Animation/images/mariowalking/result.png') left center;-->
        <!--                top: 10px;-->
        <!--                left: 0;-->
        <!--                animation: run 10s infinite linear, play 0.8s steps(4) infinite;-->
        <!--            }-->
        <!--            @keyframes play {-->
        <!--                100% { background-position: -284px; }-->
        <!--            }-->
        <!--            @keyframes run {-->
        <!--                0% { left: -100px; }-->
        <!--                100% { left: 100%; }-->
        <!--            }-->
        <!--            @keyframes wind {-->
        <!--                0% { left: -200px; }-->
        <!--                100% { left: 100%; }-->
        <!--            }-->
        <!--        </style>-->
        <!--        <div class="sky">-->
        <!--            <div class="scorebar">-->
        <!--                <p>-->
        <!--                    <span>MARIO</span>  <span style="float:right;">WORLD 1-1</span>-->
        <!--                </p>-->
        <!--            </div>-->
        <!--            <img class="cloud" src="https://raw.githubusercontent.com/LantareCode/random-this-and-thats/master/CSS/SuperMario-Animation/images/CloudSingle.gif">-->
        <!--            <img class="cloud" src="https://raw.githubusercontent.com/LantareCode/random-this-and-thats/master/CSS/SuperMario-Animation/images/CloudDouble.gif">-->
        <!--            <img class="cloud" src="https://raw.githubusercontent.com/LantareCode/random-this-and-thats/master/CSS/SuperMario-Animation/images/CloudTriple.gif">-->
        <!--            <div class="mario"></div>-->
        <!--        </div>-->
        <!--        <div class="ground"></div>-->
        <!--    </div>-->
        <!--</nav>-->
            
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

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
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

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
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

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
    <!--<ul>-->
    <!--   <li><a href="{{ route('dashboard') }}">Dashboard</a></li>-->
    <!--</ul>-->
</nav>
