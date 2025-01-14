<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Academia </title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans">
        <section class="animate__animated animate__bounce bg-center bg-no-repeat bg-[url('https://amarmedi.amarmedi.com/images/fondo.png')] bg-[#4D86A3] bg-cover bg-blend-multiply">
            <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-24">

                <img class="h-auto w-2/6 mx-auto rounded-lg shadow-emerald-900" src="{{asset('images/academia.png')}}" alt="image description">
                <p class="mb-8 text-lg font-normal text-gray-50 lg:text-xl sm:px-16 lg:px-48 ">Somos expertos apoyando a estudiantes y futuros estudiantes del área de la salud</p>

                    @if (Route::has('login'))
                        <livewire:welcome.navigation />
                    @endif
            </div>
        </section>

        <section class="px-60 bg-[url('https://amarmedi.amarmedi.com/images/patron_medi.jpeg')]">

            <div class=" mx-auto max-w-screen-xl lg:py-16">
                <x-principalcard iscategory="{{true}}">
                    @slot('category')
                        <x-categorycard>
                            @slot('contenido')
                                <svg class="w-6 h-6 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>

                                Acerca de nosotros
                            @endslot
                        </x-categorycard>
                    @endslot
                    @slot('titulo') Construyendo un Futuro Brillante para Nuestros Estudiantes @endslot
                    @slot('contenido') Diseñamos esta plataforma web con el objetivo de facilitar el acceso a nuestra comunidad y nuestras instalaciones, ofreciendo herramientas y recursos para impulsar la superación de estudiantes en las áreas de medicina, odontología y residencias. Queremos invitarte a ser parte de este proyecto dedicado a tu éxito académico y profesional. No lo dudes más, únete a nosotros y construyamos juntos tu futuro. @endslot
                </x-principalcard>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <x-principalcard >
                        @slot('titulo') Academia <br>NK-AMAR MEDI @endslot
                        @slot('contenido') Eduardo Cabba Rojas fundador visionario de la Academia NK, un hombre que decidió dejar las reglas a un lado para crear las suyas . Con determinación y ingenio , transformó su sueño en una realidad. Porque, después de todo, ¿quién necesita un manual cuando puedes escribir el tuyo? @endslot
                        @slot('buttonline')
                            Read more
                            <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        @endslot
                    </x-principalcard>

                    <x-principalcard >
                        @slot('titulo')  @endslot
                        @slot('contenido')
                            <figure class="max-w-lg">
                                <img class="h-auto max-w-full rounded-lg" src="{{asset('images/academia.png')}}" alt="image description">
                            </figure>
                        @endslot
                    </x-principalcard>
                </div>
            </div>



            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-auto overflow-hidden rounded-lg md:h-screen">
                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="https://scontent.flpb3-1.fna.fbcdn.net/v/t39.30808-6/434660558_122133502058199663_5787742355488686647_n.jpg?stp=dst-jpg_s206x206_tt6&_nc_cat=110&ccb=1-7&_nc_sid=50ad20&_nc_ohc=c-UlLeH0nAIQ7kNvgE4zJeE&_nc_zt=23&_nc_ht=scontent.flpb3-1.fna&_nc_gid=AkhzlLGQARNA2gZBPmEJytl&oh=00_AYDUiT1pVogTqefg7b5Mk2S47h4SRQNXeYBnx02T82LP1w&oe=67694E43" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 2 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="https://scontent.flpb3-1.fna.fbcdn.net/v/t39.30808-6/434658123_122133502142199663_5076306388144292607_n.jpg?stp=c18.0.925.925a_dst-jpg_s206x206_tt6&_nc_cat=101&ccb=1-7&_nc_sid=50ad20&_nc_ohc=Xu29c-0MdrUQ7kNvgFz90w1&_nc_zt=23&_nc_ht=scontent.flpb3-1.fna&_nc_gid=AkhzlLGQARNA2gZBPmEJytl&oh=00_AYDz_aH271rK7AUiVsaBvi_FOTqiXNIl_JKpT7Gu1-Wy5Q&oe=676948BD" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 3 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="https://scontent.flpb3-2.fna.fbcdn.net/v/t39.30808-6/433128785_122133502184199663_7430501494989330950_n.jpg?stp=c30.0.900.900a_dst-jpg_s206x206_tt6&_nc_cat=100&ccb=1-7&_nc_sid=50ad20&_nc_ohc=AiQAH4UkANwQ7kNvgFaNK5K&_nc_zt=23&_nc_ht=scontent.flpb3-2.fna&_nc_gid=AkhzlLGQARNA2gZBPmEJytl&oh=00_AYBRor3v7_sSE7_AN2eQ507FUMo16pIbetObzKMI3FJsmw&oe=676936FC" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 4 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="/docs/images/carousel/carousel-4.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 5 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="/docs/images/carousel/carousel-5.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
                </div>
                <!-- Slider controls -->
                <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>

        </section>

    </body>
</html>
