@extends('layouts.base')
@section('content')
    <div class="w-full my-12">
        <div class="max-w-5xl mx-auto px-6 sm:px-6 lg:px-8">
            <div class="bg-white w-full shadow rounded p-8">
                <div class="flex flex-col items-center justify-center">
                    <h1 class="font-bold text-4xl p-4 text-center">{{$data->title}}</h1>
                    <img class="rounded-lg w-[500px] h-[300px] " src="{{$data->picture}}" alt="">
                    <h2 class="p-4 text-justify">{{$data->text}}</h2>
                </div>
                <h3 class="p-2 text-right">{{$data->date}}</h3>
            </div>
        </div>
    </div>
@endsection
