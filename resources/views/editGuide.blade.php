@extends('layouts.base')
@section('content')
    <div class="h-screen bg-gray-100 justify-center">
        <div class="py-6 px-8 h-120 w-max mt-20 bg-white rounded shadow-xl">
            <h1 class="text-2xl text-gray-800 font-bold mb-5 mx-20">Gido redagavimas</h1>
            <form method="POST">
                @csrf
                @if (session('errormessage'))
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                        <p class="font-bold">Klaida!</p>
                        <p>{{ session('errormessage') }}</p>
                    </div>
                @endif
                <div class="mb-6">
                    <label for="title" class="block text-gray-800 font-bold">Pavadinimas:</label>
                    <input name="title" type="text"
                           class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600"
                           value="{{$guide['title']}}"/>
                    @error('title')
                    {{ $message }}
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="title" class="block text-gray-800 font-bold">Aprašymas:</label>
                    <textarea name="description" type="text"
                              class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" >{{$guide['description']}}</textarea>
                    @error('description')
                    {{ $message }}
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="image_url" class="block text-gray-800 font-bold">Nuotraukos nuoroda:</label>
                    <input name="image_url" type="url"
                           class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600"
                           value="{{$guide['image_url']}}"/>
                    @error('image_url')
                    {{ $message }}
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="url" class="block text-gray-800 font-bold">Laiko trukmė:</label>
                    <input name="time_required" type="number"
                           class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600"
                           value="{{$guide['time_required']}}"/>
                    @error('time_required')
                    {{ $message }}
                    @enderror
                </div>


                <div class="mb-6">
                    <label for="difficulty" class="block text-gray-800 font-bold">Sunkumas:</label>
                    <select name="difficulty" id="difficulty">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    @error('difficulty')
                    {{ $message }}
                    @enderror
                </div>


                <button
                    class="cursor-pointer py-2 px-4 block mt-6 bg-indigo-500 text-white font-bold w-full text-center rounded "
                    type="submit">Redaguoti
                </button>
            </form>
        </div>
    </div>
@endsection
