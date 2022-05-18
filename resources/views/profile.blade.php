@extends('layouts.base')
@section('content')
    <div class="mb-16">
        <div class="w-full px-10 pt-20 mb-64">
            <div class="container mx-auto">
                <div class="h-full">
                    <div class="border-b-2 block md:flex">
                        <div class="md:w-3/5 p-3 sm:p-4 lg:p-5 bg-white shadow-md">
                            <div class="flex justify-between">
                                <span class="text-xl mt-4 font-semibold block">Jūsų profilis</span>
                                <a href="#" class="text-md font-bold text-white bg-indigo-700 rounded-full px-5 py-4 hover:bg-indigo-800">Redaguoti</a>
                            </div>

                            <div class="mr-4 mt-4 h-64 w-64">
                                <img src="https://source.unsplash.com/random" role="img"
                                     class="rounded-full object-cover h-full w-full shadow-md"/>
                            </div>
                        </div>

                        <div class="md:w-full p-8 bg-white lg:ml-4 shadow-md">
                            <div class="rounded shadow p-6">
                                <div class="pb-6">
                                    <label for="username" class="font-semibold text-gray-700 block pb-1">Prisijungimo vardas:</label>
                                    <div class="flex">
                                        <input disabled id="username" class="border-1  rounded-r px-4 py-2 w-full" type="text" value="{{$userData -> username}}" />
                                    </div>
                                </div>
                                <div class="pb-4">
                                    <label for="email" class="font-semibold text-gray-700 block pb-1">Paštas:</label>
                                    <input disabled id="email" class="border-1  rounded-r px-4 py-2 w-full" type="email" value="{{$userData -> email}}" />
                                </div>
                                <div class="pb-4">
                                    <label for="role" class="font-semibold text-gray-700 block pb-1">Rolė:</label>
                                    <input disabled id="role" class="border-1  rounded-r px-4 py-2 w-full" type="text" value="{{$userData -> role == 'fixer' ? 'Taisytojas' :($userData -> role == 'user' ? 'Naudotojas' : ($userData->role  == 'admin' ? 'Administatorius' : "Redaktorius"))}}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
