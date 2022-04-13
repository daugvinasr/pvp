@extends('layouts.base')
@section('content')
    <section class="container mx-auto p-6 rounded-10">
        <h2 class="md:text-3xl font-bold text-center text-gray-500 mb-8">Pasirinkite prietaisą<br></h2>
        <div class="flex items-center justify-center">
            <div class="grid grid-cols-6 gap-2 px-16 ">
                @foreach($devices as $device)
                    <div class="flex flex-col gap-1 ">
                        <!-- Card -->
                        <a class="delay-50 duration-100 bg-white hover:bg-gray-100 p-5 rounded-lg group shadow-md" href="/guides/{{$device->devices_id}}">
                            <!-- Image Cover -->
                            <img class="rounded shadow w-[140px] h-[140px]" src="{{$device->photo_url}}"  />
                            <!-- Title -->
                            <h3 class="text-black font-bold mt-2">{{$device->name}}</h3>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
