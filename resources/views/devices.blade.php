@extends('layouts.base')
@section('content')
    <section class="container mx-auto p-6 rounded-10">
        <h2 class="md:text-3xl font-bold text-center text-gray-500 mb-8">Pasirinkite prietaisą<br></h2>
        <div class="flex items-center justify-center">
            <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 gap-2 px-16 ">
                @foreach($devices as $device)
                    <div class="flex flex-col gap-1 ">
                        <!-- Card -->
                        <a class="w-[200px] h-[290px] delay-50 duration-100 bg-white hover:bg-gray-100 p-5 rounded-lg group shadow-md"
                           href="/guides/{{$device->devices_id}}">
                            <!-- Image Cover -->
                            <div class=" w-[160px] h-[212px]">
                                <img class="rounded shadow object-cover h-full w-full" src="{{$device->photo_url}}"/>
                            </div>

                            <!-- Title -->
                            <h3 class="text-black font-bold mt-2 text-center">{{$device->name}}</h3>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="flex items-center justify-center py-20">
            <a href="/categories"
               class="bg-indigo-600 px-8 py-2 rounded text-white hover:bg-indigo-500 text-sm mr-4">Atgal</a>
            @if(session('role') == "admin" || session('role') == "editor")
                <a href="/addDevice/{{$temp}}"
                   class="bg-indigo-600 px-8 py-2 rounded text-white hover:bg-indigo-500 text-sm">Pridėti įrenginį</a>
            @endif
        </div>
    </section>
@endsection
