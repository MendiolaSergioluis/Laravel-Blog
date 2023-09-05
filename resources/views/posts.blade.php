<x-layout>
    <x-slot:title>
        Posts
    </x-slot:title>
    <nav class="fixed top-0 left-0 right-0 px-6 py-2 backdrop-blur-md bg-slate-900/70 text-white drop-shadow-lg">
        <div class="flex justify-between items-center font-semibold md:max-w-[90%] m-auto">
            <div id="Marca" class="w-full flex gap-2 justify-center md:justify-start md:w-auto">
                <a href="/" class="text-center flex flex-col gap-2 md:flex-row">
                    <img src="" alt="Logotipo" class="block">
                    <h1 class="">AtacamaStargazing</h1>
                </a>
            </div>
            <div id="Menu">
                <div id="desktop-menu" class="hidden md:flex gap-3 text-md">
                    <a href="">home</a>
                    <a href="">Blog</a>
                    <a href="">Recomendaciones</a>
                    <a href="">Legal</a>
                    <a href="">Viajero Atacama</a>
                </div>
                <div id="mobile-menu-button" class="md:hidden hover:cursor-pointer" x-cloak x-data="{burger:true, x:false}">
                    <button @click="burger = !burger; x = !x">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6" x-show="burger">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6" x-show="x">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <div x-show="x" class="absolute right-0 top-20 backdrop-blur-md bg-slate-900/70 flex flex-col gap-2 mx-2 px-4 py-2 z-50 drop-shadow-lg rounded-lg" @click.away="x=false; burger=true">
                        <a href="">home</a>
                        <a href="">Blog</a>
                        <a href="">Recomendaciones</a>
                        <a href="">Legal</a>
                        <a href="">Viajero Atacama</a>
                    </div>



                </div>
            </div>
        </div>
    </nav>

    <section class="px-6 py-8">

    </section>
</x-layout>