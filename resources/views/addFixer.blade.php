@extends('layouts.base')
@section('content')
    <div class="h-screen bg-gray-100 justify-center">
        <div class="py-6 px-8 h-120 w-80 mt-20 bg-white rounded shadow-xl">
            <form method="POST">
                @csrf

                <div class="mb-6">
                    <label for="name" class="block text-gray-800 font-bold">Vardas:</label>
                    <input name="name" type="text"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                    @error('name')
                    {{ $message }}
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="name" class="block text-gray-800 font-bold">Pavardė:</label>
                    <input name="surname" type="text"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                    @error('surname')
                    {{ $message }}
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="name" class="block text-gray-800 font-bold">Miestas:</label>
                    <input name="city" type="text"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                    @error('city')
                    {{ $message }}
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="name" class="block text-gray-800 font-bold">El. paštas:</label>
                    <input name="email" type="email"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="name" class="block text-gray-800 font-bold">Telefono numeris:</label>
                    <input name="phone_number" type="text"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                    @error('phone_number')
                    {{ $message }}
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="name" class="block text-gray-800 font-bold">Specilizacija:</label>
                    <input name="specialization" type="text"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                    @error('specialization')
                    {{ $message }}
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="name" class="block text-gray-800 font-bold">Detaliau apie paslaugas:</label>
                    <textarea name="description" id="" cols="10" rows="10" class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600 h-24"></textarea>
                    @error('description')
                    {{ $message }}
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="name" class="block text-gray-800 font-bold">Nuotraukos nuorada:</label>
                    <input name="photo_url" type="url"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                    @error('photo_url')
                    {{ $message }}
                    @enderror
                </div>

                <button class="cursor-pointer py-2 px-4 block mt-6 bg-indigo-500 text-white font-bold w-full text-center rounded " type="submit">Pridėti taisytoją</button>
            </form>
        </div>
    </div>
@endsection
