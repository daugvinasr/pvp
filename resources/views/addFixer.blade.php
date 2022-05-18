@extends('layouts.base')
@section('content')
    <div class="h-screen bg-gray-100 justify-center">
        <div class="py-6 px-8 h-120 w-max mt-20 bg-white rounded shadow-xl">
            <h1 class="text-2xl text-gray-800 font-bold mb-5 mx-20">Pateikite savo informaciją:</h1>
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
                            <label for="name" class="block text-gray-800 font-bold">Detaliau apie paslaugas:</label>
                            <textarea name="description" id="" cols="10" rows="10" class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600 h-24"></textarea>
                            {{--                            <input name="description" type="text"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />--}}

                            @error('description')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div>
                        <div class="mb-6">
                            <label for="name" class="block text-gray-800 font-bold">Telefono numeris:</label>
                            <input name="phone_number" type="text"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                            @error('phone_number')
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
                            <label for="name" class="block text-gray-800 font-bold">Nuotraukos nuorada:</label>
                            <input name="photo_url" type="url"  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                            @error('photo_url')
                            {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="name" class="block text-gray-800 font-bold">Specializacija:</label>
                            <p for="name" class="text-sm text-gray-400">Sužymėkite laikant CTRL</p>
                            <select name="categories_list[]" multiple="multiple" class="border-indigo-200 border-2 rounded-sm">
                                @foreach($categories as $category)
                                    <option value="{{ $category->categories_id  }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('categories_list')
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
