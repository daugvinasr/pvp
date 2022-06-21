@extends('layouts.base')
@section('content')
    <div class="h-screen bg-gray-100">
        <h2 class="p-4 md:text-3xl font-bold text-center text-gray-500">Redaktoriaus registracijos forma</h2>
        <p class="p-4 text-gray-700 text-center mb-2">Džiaugiamės jūsų susidomėjimu prisidėti prie TaiSau komandos.
        Norint gauti prieigą prie gidų rašymo funkcionalumo, prašome užpildyti žemiau pateiktą formą.</p>
        <p class="p-2 text-gray-700 text-center mb-2">TaiSau vos įsitikinus, kad pateikti duomenys atitinka paslaugos
            kokybės reikalavimus, gausite redaktoriaus rolę paslaugoje!</p>
        <div class="py-6 px-8 h-120 bg-white rounded shadow-xl">
            <form method="POST">
                @csrf
                @if (session('errormessage'))
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                        <p class="font-bold">Klaida!</p>
                        <p>{{ session('errormessage') }}</p>
                    </div>
                @endif
                <div class="grid grid-cols-2 gap-4 px-10">
                    <div>
                        <div class="mb-6">
                            <label for="name" class="block text-gray-800 font-bold">Vardas:</label>
                            <input name="name" type="text"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                            @error('name')
                            {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="phone_number" class="block text-gray-800 font-bold">Telefono numeris:</label>
                            <input name="phone_number" type="text"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                            @error('phone_number')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div>
                        <div class="mb-6">
                            <label for="surname" class="block text-gray-800 font-bold">Pavardė:</label>
                            <input name="surname" type="text"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                            @error('surname')
                            {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="description" class="block text-gray-800 font-bold">Detaliau apie jūsų patirtį:</label>
                            <textarea name="description" id="" cols="10" rows="10" class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600 h-24"></textarea>
                            @error('description')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <button class="cursor-pointer py-2 px-4 block mt-6 bg-indigo-500 text-white font-bold w-full text-center rounded " type="submit">Registruotis</button>
            </form>
        </div>
    </div>
@endsection
