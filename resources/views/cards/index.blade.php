@extends('layouts.app')

@section('content')
    <div class="container m-auto text-right">

        <p class="path text-xl font-semibold mt-4">

            <a href="/cards" class="text-gray-500 hover:text-gray-600">

                <span class="border-b-2 border-gray-500 p-2">
                    # البطاقات
                </span>

                <span class="inline-block ml-2">
                    /
                </span>

                <span class="p-2">
                    . . .
                </span>

            </a>

        </p>


        <div class="container mt-16">

            @if(auth()->guest())
                <button
                    onclick="window.location.href='/login'"
                    type="button"
                    class="flex items-center gap-2 btn btn-lg bg-gray-800 font-semibold text-white hover:text-gray-600"
                    data-toggle="modal" data-target="#driverModel">

                    <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="plus-circle" role="img"
                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                         class="w-5">
                        <path fill="currentColor"
                              d="M384 250v12c0 6.6-5.4 12-12 12h-98v98c0 6.6-5.4 12-12 12h-12c-6.6 0-12-5.4-12-12v-98h-98c-6.6 0-12-5.4-12-12v-12c0-6.6 5.4-12 12-12h98v-98c0-6.6 5.4-12 12-12h12c6.6 0 12 5.4 12 12v98h98c6.6 0 12 5.4 12 12zm120 6c0 137-111 248-248 248S8 393 8 256 119 8 256 8s248 111 248 248zm-32 0c0-119.9-97.3-216-216-216-119.9 0-216 97.3-216 216 0 119.9 97.3 216 216 216 119.9 0 216-97.3 216-216z"
                              class=""></path>
                    </svg>

                    <p>
                        حجز بطاقة جديده
                    </p>

                    @else

                        <button
                            type="button"
                            class="flex items-center gap-2 btn btn-lg bg-gray-800 font-semibold text-white hover:text-gray-600"
                            data-toggle="modal" data-target="#cardModel">

                            <svg aria-hidden="true" focusable="false" data-prefix="fal"
                                 data-icon="credit-card-blank" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 576 512" class="inline-block w-6 ml-3">
                                <path fill="currentColor"
                                      d="M528 31H48C21.5 31 0 52.5 0 79v352c0 26.5 21.5 48 48 48h480c26.5 0 48-21.5 48-48V79c0-26.5-21.5-48-48-48zm16 400c0 8.8-7.2 16-16 16H48c-8.8 0-16-7.2-16-16V79c0-8.8 7.2-16 16-16h480c8.8 0 16 7.2 16 16v352zm-352-68v8c0 6.6-5.4 12-12 12h-72c-6.6 0-12-5.4-12-12v-8c0-6.6 5.4-12 12-12h72c6.6 0 12 5.4 12 12zm192 0v8c0 6.6-5.4 12-12 12H236c-6.6 0-12-5.4-12-12v-8c0-6.6 5.4-12 12-12h136c6.6 0 12 5.4 12 12z"
                                      class=""></path>


                                <p>
                                    حجز بطاقة جديده
                                </p>

                        </button>

                    @endif


                    @if(!auth()->guest())
                        <div class="mt-8">

                            @if(auth()->user()->role == 'user')
                                <h1 class="text-right text-xl font-semibold p-4 text-gray-600">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fal"
                                         data-icon="credit-card-blank" role="img" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 576 512" class="inline-block w-6 ml-3">
                                        <path fill="currentColor"
                                              d="M528 31H48C21.5 31 0 52.5 0 79v352c0 26.5 21.5 48 48 48h480c26.5 0 48-21.5 48-48V79c0-26.5-21.5-48-48-48zm16 400c0 8.8-7.2 16-16 16H48c-8.8 0-16-7.2-16-16V79c0-8.8 7.2-16 16-16h480c8.8 0 16 7.2 16 16v352zm-352-68v8c0 6.6-5.4 12-12 12h-72c-6.6 0-12-5.4-12-12v-8c0-6.6 5.4-12 12-12h72c6.6 0 12 5.4 12 12zm192 0v8c0 6.6-5.4 12-12 12H236c-6.6 0-12-5.4-12-12v-8c0-6.6 5.4-12 12-12h136c6.6 0 12 5.4 12 12z"
                                              class=""></path>
                                    </svg>

                                    <span
                                        class="inline-block border-l-2 border-b-2 border-gray-500 pl-8 pb-4 rounded-lg">
                                    بطاقاتي
                                </span>
                                </h1>
                            @else
                                <h1 class="text-right text-xl font-semibold p-4 text-gray-600">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fal"
                                         data-icon="credit-card-blank" role="img" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 576 512" class="inline-block w-6 ml-3">
                                        <path fill="currentColor"
                                              d="M528 31H48C21.5 31 0 52.5 0 79v352c0 26.5 21.5 48 48 48h480c26.5 0 48-21.5 48-48V79c0-26.5-21.5-48-48-48zm16 400c0 8.8-7.2 16-16 16H48c-8.8 0-16-7.2-16-16V79c0-8.8 7.2-16 16-16h480c8.8 0 16 7.2 16 16v352zm-352-68v8c0 6.6-5.4 12-12 12h-72c-6.6 0-12-5.4-12-12v-8c0-6.6 5.4-12 12-12h72c6.6 0 12 5.4 12 12zm192 0v8c0 6.6-5.4 12-12 12H236c-6.6 0-12-5.4-12-12v-8c0-6.6 5.4-12 12-12h136c6.6 0 12 5.4 12 12z"
                                              class=""></path>
                                    </svg>

                                    <span
                                        class="inline-block border-l-2 border-b-2 border-gray-500 pl-8 pb-4 rounded-lg">
                                    البطاقات
                                </span>
                                </h1>
                            @endif
                            <table class="min-w-full table-auto">

                                <thead class="justify-between">
                                <tr class="bg-gray-800">

                                    <th class="px-16 py-2">
                                        <span class="text-gray-300">الترتيب</span>
                                    </th>

                                    <th class="px-16 py-2">
                                        <span class="text-gray-300">رقم البطاقة</span>
                                    </th>

                                    <th class="px-16 py-2">
                                        <span class="text-gray-300">تاريخ فعالية البطاقة</span>
                                    </th>

                                    <th class="px-16 py-2">
                                        <span class="text-gray-300">موعد فعالية البطاقة ( الساعه )</span>
                                    </th>

                                    <th class="px-16 py-2">
                                        <span class="text-gray-300">ملاحظات</span>
                                    </th>

                                    @if(auth()->user()->role == 'admin')
                                        <th class="px-16 py-2">
                                            <span class="text-gray-300">حذف</span>
                                        </th>
                                    @endif


                                </tr>
                                </thead>

                                <tbody class="bg-gray-200">

                                @if(auth()->user()->role == 'admin')
                                    @foreach(\App\Card::all() as $card)
                                        <tr class="bg-white flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 border-4 border-gray-200">


                                            <td class="px-16 py-2 flex flex-row items-center date-font font-semibold text-3xl">
                                                {{ $loop->iteration }}
                                            </td>

                                            <td class="text-lg font-semibold date-font text-center tracking-widest text-red-700">
                                                {{ $card->card_number }}
                                            </td>

                                            <td class="text-lg font-semibold date-font tracking-widest text-center">
                                                {{ substr($card->card_number, 0, 4) . ' - ' . substr($card->card_number, 4, 2) . ' - ' . substr($card->card_number, 6, 2) }}
                                            </td>

                                            <td class="text-lg font-semibold date-font text-center tracking-widest">
                                                {{ $card->getTimeCardActive() }}
                                            </td>

                                            <td class="text-lg font-semibold">
                                                تبقى البطاقة ساريه لبعد
                                                <br>
                                                نصف ساعه
                                                من انتهاء الموعد
                                            </td>

                                            <td class="text-lg text-center font-semibold">
                                                <form method="post" action="/cards/{{$card->id}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-dark">
                                                        حذف
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    @foreach(\App\Card::where('user_id', auth()->user()->id)->get() as $card)
                                        <tr class="bg-white flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 border-4 border-gray-200">


                                            <td class="px-16 py-2 flex flex-row items-center date-font font-semibold text-3xl">
                                                {{ $loop->iteration }}
                                            </td>

                                            <td class="text-lg font-semibold date-font text-center tracking-widest text-red-700">
                                                {{ $card->card_number }}
                                            </td>

                                            <td class="text-lg font-semibold date-font tracking-widest text-center">
                                                {{ substr($card->card_number, 0, 4) . ' - ' . substr($card->card_number, 4, 2) . ' - ' . substr($card->card_number, 6, 2) }}
                                            </td>

                                            <td class="text-lg font-semibold date-font text-center tracking-widest">
                                                {{ $card->getTimeCardActive() }}
                                            </td>

                                            <td class="text-lg font-semibold">
                                                تبقى البطاقة ساريه لبعد نصف ساعه
                                                <br>
                                                من انتهاء الموعد
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                                </tbody>

                            </table>
                        </div>
            @endif

        </div>

    </div>
@endsection
