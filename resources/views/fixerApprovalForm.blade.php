@extends('layouts.base')
@section('content')
    <div class="h-screen bg-gray-100">
        <h2 class="p-4 md:text-3xl font-bold text-center text-gray-500">Taisytojo patvirtinimas</h2>
        <p class="p-4 text-gray-700 text-center mb-2">Siekdami įsitikinti, kad taisytojai atliktų savo užsakymus
            sąžiningai, suteikiame galimybę kiekvienam taisytojui užpildyti papildomą asmeninės informacijos formą.</p>
        <p class="p-2 text-gray-700 text-center mb-2">TaiSau vos įsitikinus, kad pateikti duomenys teisingi, suteiksime
            profilio patvirtinimą!</p>
        <div class="py-6 px-8 h-120 bg-white rounded shadow-xl">
            <form method="POST">
                @csrf
                @if (session('errormessage'))
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                        <p class="font-bold">Duomenų patvirtinti nepavyko</p>
                        <p>{{ session('errormessage') }}</p>
                    </div>
                @endif
                <div class="grid grid-cols-2 gap-4 px-10">
                    <div class="mb-8">
                        <label for="address" class="block text-gray-800 font-bold">Gyvenamasis adresas:</label>
                        <input name="address" type="text" placeholder="pvz: Savanorių pr. 147, Kaunas"
                               class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600"/>
                        @error('address')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="zipcode" class="block text-gray-800 font-bold">Pašto kodas:</label>
                        <input name="zipcode" type="text" placeholder="pvz: 04847"
                               class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600"/>
                        @error('zipcode')
                        {{ $message }}
                        @enderror
                    </div>
                    {{--                <div class="mb-4">--}}
                    {{--                    <label for="idnumber" class="block text-gray-800 font-bold">Asmens kodas:</label>--}}
                    {{--                    <input name="idnumber" type="text" placeholder="pvz.: 33309240064"--}}
                    {{--                           class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600"/>--}}
                    {{--                    @error('idnumber')--}}
                    {{--                    {{ $message }}--}}
                    {{--                    @enderror--}}
                    {{--                </div>--}}
                    {{--                    <div class="w-1/2 pt-2 ml-36">--}}
                    {{--                    </div>--}}

                </div>
                <div class="grid gap-4 px-10">
                    <div class="flex flex-col">
                        <button
                            class="cursor-pointer py-2 px-4 block mt-6 bg-indigo-500 text-white font-bold text-center rounded "
                            type="submit">Pateikti
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
