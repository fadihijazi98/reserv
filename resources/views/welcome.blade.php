@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center p-4">

            <div class="col-12">


                @if (session('message'))
                    <div
                        class="text-right alert alert-dark bg-green-600 text-white alert-dismissible fade show tracking-widest"
                        role="alert">
                        <b>
                            <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="check" role="img"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                 class="inline-block w-6">
                                <path fill="currentColor"
                                      d="M413.505 91.951L133.49 371.966l-98.995-98.995c-4.686-4.686-12.284-4.686-16.971 0L6.211 284.284c-4.686 4.686-4.686 12.284 0 16.971l118.794 118.794c4.686 4.686 12.284 4.686 16.971 0l299.813-299.813c4.686-4.686 4.686-12.284 0-16.971l-11.314-11.314c-4.686-4.686-12.284-4.686-16.97 0z"
                                      class=""></path>
                            </svg>
                            {{ session('message') }}
                        </b>

                        <button type="button" class="close hover:text-white"
                                style="left: 0!important;right: unset!important;" data-dismiss="alert"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>
                @endif
            </div>

            @foreach(\App\Destination::all()->sortByDesc('id') as $destination)

                <div class="col-12 p-4 my-2 rounded-lg border-2 border-gray-400">

                    <a href="/show/{{$destination->id}}">
                        <h1 class="text-xl text-gray-600 text-right hover:text-gray-500">

                            <span class="bg-gray-400 inline-block p-3 font-semibold rounded-lg">
                                <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="flag" role="img"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                     class="inline-block w-6"><path
                                        fill="currentColor"
                                        d="M344.348 74.667C287.742 74.667 242.446 40 172.522 40c-28.487 0-53.675 5.322-76.965 14.449C99.553 24.713 75.808-1.127 46.071.038 21.532.999 1.433 20.75.076 45.271-1.146 67.34 12.553 86.382 32 93.258V500c0 6.627 5.373 12 12 12h8c6.627 0 12-5.373 12-12V378.398c31.423-14.539 72.066-29.064 135.652-29.064 56.606 0 101.902 34.667 171.826 34.667 51.31 0 91.933-17.238 130.008-42.953 6.589-4.45 10.514-11.909 10.514-19.86V59.521c0-17.549-18.206-29.152-34.122-21.76-36.78 17.084-86.263 36.906-133.53 36.906zM48 28c11.028 0 20 8.972 20 20s-8.972 20-20 20-20-8.972-20-20 8.972-20 20-20zm432 289.333C456.883 334.03 415.452 352 371.478 352c-63.615 0-108.247-34.667-171.826-34.667-46.016 0-102.279 10.186-135.652 26V106.667C87.117 89.971 128.548 72 172.522 72c63.615 0 108.247 34.667 171.826 34.667 45.92 0 102.217-18.813 135.652-34.667v245.333z"
                                        class=""></path></svg>
                                {{ $destination->description }}

                            </span>
                        </h1>
                    </a>


                    <div class="container mx-auto">

                        <div class="grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1">
                            @foreach(\App\Trip::all()->where('id_destination', $destination->id)->take(4) as $trip)

                                <div class="relative bg-gray-400 mx-2 my-4 rounded-t">

                                    <div
                                        class="flex justify-content-center align-items-center bg-gray-800 h-32 rounded-t">
                                        <span class="text-white text-4xl date-font font-semibold tracking-widest">
                                            {{ $trip->getDayMonthDateFormat() }}
                                        </span>
                                    </div>

                                    <div class="">

                                        <div class="text-right">

                                            <img src="{{ $trip->driver->img ? $trip->driver->img : 'user.jpeg'}}"
                                                 class="inline-block w-16 h-16 rounded-full p-2"/>

                                            السائق:
                                            <span class="font-semibold">
                                                {{ $trip->driver->name }}
                                            </span>

                                        </div>

                                        <div class="text-center">

                                            <p>
                                                موعد الرحلة :
                                                <span class="date-font font-semibold tracking-widest text-red-500">
                                                    {{ $trip->date }}
                                                </span>
                                            </p>

                                            <p>
                                                موعد الانطلاق :
                                                <span class="date-font font-semibold tracking-widest text-red-500">
                                                    {{ $trip->getHourMinuteFormat() }}
                                                </span>
                                            </p>

                                            <div class="bg-gray-300 my-2 p-2">
                                                <p>
                                                    سعة المركبة :
                                                    <span class="date-font font-semibold tracking-widest text-xl">
                                                    {{ $trip->driver->vehicle_capacity < 10 ? '0' . $trip->driver->vehicle_capacity : $trip->driver->vehicle_capacity }}
                                                </span>
                                                </p>

                                                <p class="{{$trip->getAvailablePassenger() == 0 ? 'line-through' : ''}}">
                                                    العدد المتبقي :
                                                    <span
                                                        class="date-font font-semibold tracking-widest text-red-500 text-xl">
                                                    {{ $trip->getAvailablePassenger() }}
                                                </span>
                                                </p>
                                            </div>


                                        </div>

                                        <div class="text-center px-2 py-4">

                                            @if(auth()->guest())
                                                <button
                                                    {{ $trip->getAvailablePassenger() == 0 ? 'disabled' : '' }}
                                                    class="btn bg-gray-800 hover:bg-gray-700 font-semibold text-white">
                                                        <a href="{{ $trip->getAvailablePassenger() == 0 ? '#' : route('login') }}" class="hover:text-white">
                                                            احجز الآن
                                                        </a>
                                                </button>
                                            @else
                                                <button
                                                    {{ $trip->getAvailablePassenger() == 0 ? 'disabled' : '' }}
                                                    data-toggle="modal" data-target="#passengerModel"
                                                    onclick="document.getElementById('trip_id').value = {{$trip->id}}"
                                                    class="btn bg-gray-800 hover:bg-gray-700 font-semibold text-white">
                                                    احجز الآن
                                                </button>
                                            @endif

                                        </div>


                                    </div>

                                </div>
                            @endforeach


                        </div>

                    </div>


                </div>

            @endforeach

        </div>

    </div>

@endsection
