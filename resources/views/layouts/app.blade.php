<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Changa:wght@300&family=Lalezar&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poiret+One&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <style>

        body {
            font-family: 'Changa', sans-serif;
        }

        .logo-font {
            font-family: 'Changa', sans-serif;
        }

        .date-font {
            font-family: 'Poiret One', cursive;
        }

        .cover {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url("/bg01.jpg");
            filter: blur(8px);
            background-size: cover;
        }

        a:hover {
            text-decoration: none !important;
        }


    </style>

</head>
<body class="relative" style="min-height: 100vh">
<div class="bg-gray-300 absolute inset-0 z-10" style="opacity: .97"></div>
<div class="cover"></div>

<div id="app" dir="rtl" class="relative z-20">
    <nav class="navbar navbar-expand-md border-b py-4 border-gray-400">
        <div class="container flex sm:flex-col lg:flex-row">

            <div class="flex items-center">
                <a class="tracking-widest font-semibold logo-font text-2xl font-light rounded-full py-2 px-5"
                   href="{{ url('/') }}">
                    حجوزات
                </a>

                <!-- Left Side Of Navbar -->
                <ul class="inline-block space-x-4 flex">

                    @if(!auth()->guest() && auth()->user()->role == 'admin')

                        <li class="text-lg p-2 ml-4">
                            <a href="/trips">
                                الرحلات
                            </a>
                        </li>

                        <li class="text-lg p-2">
                            <a href="/drivers">
                                السائقين
                            </a>
                        </li>

                        <li class="text-lg p-2">
                            <a href="/destinations">
                                الوجهات
                            </a>
                        </li>

                        <li class="text-lg p-2">
                            <a href="/cards">
                                البطاقات
                            </a>
                        </li>

                    @else

                        <li class="text-lg p-2 ml-4">
                            <a href="/">
                                الرّحل
                            </a>
                        </li>

                        <li class="text-lg p-2">
                            <a href="/cards">
                                حجز بطاقة
                            </a>
                        </li>

                        <li class="text-lg p-2">
                            <a href="#">
                                عنّا
                            </a>
                        </li>

                    @endif


                </ul>
            </div>


            <div class="flex justify-content-center items-center" id="navbarSupportedContent">

                <!-- Right Side Of Navbar -->
                <ul class="flex">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item bg-gray-600 text-white px-2 py-1 rounded-r-full">
                            <a class="nav-link hover:text-gray-300" href="{{ route('login') }}">
                                <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="sign-in-alt"
                                     role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                     class="inline-block w-4">
                                    <path fill="currentColor"
                                          d="M32 217.1c0-8.8 7.2-16 16-16h144v-93.9c0-7.1 8.6-10.7 13.6-5.7l141.6 143.1c6.3 6.3 6.3 16.4 0 22.7L205.6 410.4c-5 5-13.6 1.5-13.6-5.7v-93.9H48c-8.8 0-16-7.2-16-16v-77.7m-32 0v77.7c0 26.5 21.5 48 48 48h112v61.9c0 35.5 43 53.5 68.2 28.3l141.7-143c18.8-18.8 18.8-49.2 0-68L228.2 78.9c-25.1-25.1-68.2-7.3-68.2 28.3v61.9H48c-26.5 0-48 21.6-48 48zM512 400V112c0-26.5-21.5-48-48-48H332c-6.6 0-12 5.4-12 12v8c0 6.6 5.4 12 12 12h132c8.8 0 16 7.2 16 16v288c0 8.8-7.2 16-16 16H332c-6.6 0-12 5.4-12 12v8c0 6.6 5.4 12 12 12h132c26.5 0 48-21.5 48-48z"
                                          class=""></path>
                                </svg>
                                دخول</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item bg-gray-400 pl-2 pr-1 py-1 rounded-l-lg">
                                <a class="nav-link" href="{{ route('register') }}">حساب جديد
                                    <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="user-plus"
                                         role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                                         class="inline-block w-5">
                                        <path fill="currentColor"
                                              d="M632 224h-88v-88c0-4.4-3.6-8-8-8h-16c-4.4 0-8 3.6-8 8v88h-88c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h88v88c0 4.4 3.6 8 8 8h16c4.4 0 8-3.6 8-8v-88h88c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8zm-318.4 64c-28.7 0-42.5 16-89.6 16-47.1 0-60.8-16-89.6-16C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4zM416 464c0 8.8-7.2 16-16 16H48c-8.8 0-16-7.2-16-16v-41.6C32 365.9 77.9 320 134.4 320c19.6 0 39.1 16 89.6 16 50.4 0 70-16 89.6-16 56.5 0 102.4 45.9 102.4 102.4V464zM224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm0-224c52.9 0 96 43.1 96 96s-43.1 96-96 96-96-43.1-96-96 43.1-96 96-96z"
                                              class=""></path>
                                    </svg>
                                </a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="user" role="img"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                     class="w-4 inline-block">
                                    <path fill="currentColor"
                                          d="M313.6 288c-28.7 0-42.5 16-89.6 16-47.1 0-60.8-16-89.6-16C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4zM416 464c0 8.8-7.2 16-16 16H48c-8.8 0-16-7.2-16-16v-41.6C32 365.9 77.9 320 134.4 320c19.6 0 39.1 16 89.6 16 50.4 0 70-16 89.6-16 56.5 0 102.4 45.9 102.4 102.4V464zM224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm0-224c52.9 0 96 43.1 96 96s-43.1 96-96 96-96-43.1-96-96 43.1-96 96-96z"
                                          class=""></path>
                                </svg>
                                {{ explode(' ', Auth::user()->name)[0] }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    تسجيل الخروج
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4" style="min-height: 70vh;">
        @yield('content')
    </main>

    <footer>
        <div class="min-h-64 bg-gray-800 mt-4">
            <div class="container mx-auto grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">

                <div class="text-center text-xl text-white p-8">

                    <p class="font-semibold">
                        <span class="inline-block text-gray-300 border-b-2 border-gray-300">
                            القائمة
                        </span>
                    </p>

                    <ul class="mt-3">

                        <li>
                            <a href="/" class="hover:text-gray-300">
                                حجوزات
                            </a>
                        </li>

                        <li>
                            <a href="/" class="hover:text-gray-300">
                                الرّحل
                            </a>
                        </li>

                        <li>
                            <a href="/cards" class="hover:text-gray-300">
                                حجز بطاقات
                            </a>
                        </li>

                    </ul>
                </div>

                <div class="text-center text-xl text-white p-8">

                    <p class="font-semibold">
                        <span class="inline-block text-gray-300 border-b-2 border-gray-300">
                            الوجهات
                        </span>
                    </p>

                    <ul class="mt-3">
                        @foreach(\App\Destination::all()->take(3) as $destination)
                        <li>
                            <a href="/show/{{$destination->id}}" class="hover:text-gray-300">
                                {{ $destination->description }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="text-center text-xl text-white p-8">

                    <p class="font-semibold">
                        <span class="inline-block text-gray-300 border-b-2 border-gray-300">
                            الحسابات
                        </span>
                    </p>

                    <ul class="mt-3">

                        <li>
                            <a href="{{route('login')}}" class="hover:text-gray-300">
                                تسجيل حساب جديد
                            </a>
                        </li>

                        <li>
                            <a href="{{route('register')}}" class="hover:text-gray-300">
                                تسجيل الدخول
                            </a>
                        </li>


                    </ul>
                </div>



            </div>
        </div>
    </footer>

</div>

@include('components.passenger-dialog')
@include('components.card-dialog')

@if(!auth()->guest() && auth()->user()->role == 'admin')

    <!-- dialogs .. -->
    @include('components.driver-dialog')
    @include('components.destination-dialog')

    @if(isset($trip_view) && $trip_view === true)
        @include('components.trip-dialog')
    @endif

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#imgInp").change(function () {
            readURL(this);
        });

    </script>

@endif

</body>
</html>
