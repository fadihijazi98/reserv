@extends('layouts.app')

@section('content')

    <div class="container m-auto text-right">

        <p class="path text-xl font-semibold mt-4">

            <a href="/trips" class="text-gray-500 hover:text-gray-600">

                <span class="border-b-2 border-gray-500 p-2">
                    # الرحل
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

            <button
                type="button"
                class="flex items-center gap-2 btn btn-lg bg-gray-800 font-semibold text-white hover:text-gray-600"
                data-toggle="modal" data-target="#tripModel">

                <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="plus-circle" role="img"
                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                     class="w-5">
                    <path fill="currentColor"
                          d="M384 250v12c0 6.6-5.4 12-12 12h-98v98c0 6.6-5.4 12-12 12h-12c-6.6 0-12-5.4-12-12v-98h-98c-6.6 0-12-5.4-12-12v-12c0-6.6 5.4-12 12-12h98v-98c0-6.6 5.4-12 12-12h12c6.6 0 12 5.4 12 12v98h98c6.6 0 12 5.4 12 12zm120 6c0 137-111 248-248 248S8 393 8 256 119 8 256 8s248 111 248 248zm-32 0c0-119.9-97.3-216-216-216-119.9 0-216 97.3-216 216 0 119.9 97.3 216 216 216 119.9 0 216-97.3 216-216z"
                          class=""></path>
                </svg>

                <p>
                    اضافة رحله جديده
                </p>


            </button>

            <div class="mt-8">

                <table class="min-w-full table-auto">

                    <thead class="justify-between">

                    <tr class="bg-gray-800">

                        <th class="px-16 py-2">
                            <span class="text-gray-300">تاريخ الرحلة</span>
                        </th>

                        <th class="px-16 py-2">
                            <span class="text-gray-300">موعد الانطلاق</span>
                        </th>

                        <th class="px-16 py-2">
                            <span class="text-gray-300">السائق</span>
                        </th>

                        <th class="px-16 py-2">
                            <span class="text-gray-300">الوجهه</span>
                        </th>

                        <th class="px-16 py-2">
                            <span class="text-gray-300">عرض التفاصيل</span>
                        </th>


                        <th class="px-16 py-2">
                            <span class="text-gray-300">حذف</span>
                        </th>

                    </tr>

                    </thead>

                    <tbody class="bg-gray-200">
                    @foreach($trips as $trip)
                        <tr class="bg-white flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 border-4 border-gray-200">

                            <td class="text-center">
                                <span class="text-center ml-2 font-semibold">
                                    {{ $trip->date }}
                                </span>
                            </td>

                            <td class="px-16 py-2">
                                <span class="text-center ml-2 font-semibold">
                                {{ $trip->hour }}
                                </span>
                            </td>

                            <td class="px-16 py-2">
                                <span class="text-center ml-2 font-semibold">
                                {{ \App\Driver::find($trip->id_driver)->name }}
                                </span>
                            </td>

                            <td class="px-16 py-2">
                                <span class="text-center ml-2 font-semibold">
                                {{ \App\Destination::find($trip->id_destination)->description }}
                                </span>
                            </td>

                            <td class="px-16 py-2" dir="ltr">
                                <a
                                    href="/passengers_trip/{{ $trip->id }}"
                                    class="btn bg-gray-400 font-semibold hover:bg-gray-600 hover:text-white">
                                    تفاصيل
                                </a>
                            </td>


                            <td class="px-16 py-2" dir="ltr">
                                <form action="/trips/{{$trip->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn bg-gray-400 font-semibold hover:bg-gray-600 hover:text-white">
                                        حذف
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


        </div>

    </div>
@endsection
