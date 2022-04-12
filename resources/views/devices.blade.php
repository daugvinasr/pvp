@extends('layouts.base')
@section('content')
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
@endsection
