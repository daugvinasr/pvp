@extends('layouts.base')
@section('content')
    <div class="flex items-center justify-center">
        <div class="grid grid-cols-6 gap-2 px-16 ">
        @foreach($devices as $device)
                <div class="flex flex-col gap-1 ">
        <!-- Card -->
        <a class="delay-50 duration-100 bg-white hover:bg-gray-100 p-5 rounded-lg w-60 group shadow-md" href="/guides/{{$device->devices_id}}">
            <!-- Image Cover -->
            <img src="https://picsum.photos/250/250" class="w-full rounded shadow" />

            <!-- Title -->
            <h3 class="text-black font-bold mt-5">{{$device->name}}</h3>
        </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
