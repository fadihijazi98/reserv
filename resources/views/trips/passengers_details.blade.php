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
                    الركاب
                </span>

            </a>

        </p>


        <div class="container mt-16">

            <div class="mt-8">

                <table class="min-w-full table-auto">

                    <thead class="justify-between">

                    <tr class="bg-gray-800">

                        <th class="px-16 py-2 text-white">
                            الترتيب
                        </th>

                        <th class="px-16 py-2">
                            <span class="text-white">اسم الراكب</span>
                        </th>

                        <th class="px-16 py-2">
                            <span class="text-white">رقم هاتف الراكب</span>
                        </th>

                        <th class="px-16 py-2">
                            <span class="text-white">عنوان الراكب</span>
                        </th>

                        <th class="px-16 py-2">
                            <span class="text-white">حذف</span>
                        </th>

                    </tr>

                    </thead>

                    <tbody class="bg-gray-200">
                        @foreach($passengers as $passenger)
                            <tr>

                                <th class="px-16 py-2 date-font">
                                    {{ $loop->iteration }}
                                </th>

                                <td class="px-16 py-2 text-lg">
                                    {{ $passenger->name }}
                                </td>

                                <td class="px-16 py-2 text-lg">
                                    {{ $passenger->phone }}
                                </td>

                                <td class="px-16 py-2 text-lg">
                                    {{ $passenger->address }}
                                </td>

                                <td class="px-16 py-2" dir="ltr">
                                    <form action="/passenger/{{$passenger->id}}" method="post">
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
