@extends('layouts.base')
@section('content')
    <div class="h-screen bg-gray-100 justify-center">
        <div class="py-6 px-8 h-120 w-max mt-20 bg-white rounded shadow-xl">
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
                            <input name="name" type="text" value="{{$fixerData[0]->name}}"
                                   class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600"/>
                            @error('name')
                            {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="name" class="block text-gray-800 font-bold">Pavardė:</label>
                            <input name="surname" type="text" value="{{$fixerData[0]->surname}}"
                                   class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600"/>
                            @error('surname')
                            {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="name" class="block text-gray-800 font-bold">Miestas:</label>
                            <input name="city" type="text" value="{{$fixerData[0]->city}}"
                                   class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600"/>
                            @error('city')
                            {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="name" class="block text-gray-800 font-bold">El. paštas:</label>
                            <input name="email" type="email" value="{{$fixerData[0]->email}}"
                                   class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600"/>
                            @error('email')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div>
                        <div class="mb-6">
                            <label for="name" class="block text-gray-800 font-bold">Telefono numeris:</label>
                            <input name="phone_number" type="text" value="{{$fixerData[0]->phone_number}}"
                                   class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600"/>
                            @error('phone_number')
                            {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="name" class="block text-gray-800 font-bold">Detaliau apie paslaugas:</label>
                            {{--                            <textarea name="description" id="" cols="10" rows="10" class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600 h-24"></textarea>--}}
                            <input name="description" type="text" value="{{$fixerData[0]->description}}"
                                   class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600"/>
                            @error('description')
                            {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="name" class="block text-gray-800 font-bold">Nuotraukos nuorada:</label>
                            <input name="photo_url" type="url" value="{{$fixerData[0]->photo_url}}"
                                   class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600"/>
                            @error('photo_url')
                            {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="name" class="block text-gray-800 font-bold">Specializacija:</label>
                            <p for="name" class="text-sm text-gray-400">Sužymėkite laikant CTRL</p>
                            <select name="categories_list[]" multiple="multiple"
                                    class="border-indigo-200 border-2 rounded-sm">
                                @foreach($categories as $category)
                                    <option value="{{ $category->categories_id  }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('categories_list')
                            {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="name" class="block text-gray-800 font-bold">Patvirtintas:</label>
                            @if($fixerData[0]->approved == 0)
                                <input disabled type="text" value="Ne" class="w-min border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600">
                                <br />
                                <a href="/fixerProfileEdit/{{$fixerData[0] -> repairmans_id}}/approval" class="text-sm text-gray-400"> (Kaip gauti patvirtinimą?)</a>
                            @elseif($fixerData[0]->approved == 1)
                                <input disabled type="text" value="Taip" class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600">
                            @endif
                        </div>
                    </div>
                </div>
                <button
                    class="cursor-pointer py-2 px-4 block mt-6 bg-indigo-500 text-white font-bold w-full text-center rounded "
                    type="submit">Patvirtinti
                </button>
            </form>
        </div>
    </div>
@endsection
