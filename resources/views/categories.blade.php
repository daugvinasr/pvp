@extends('layouts.base')
@section('content')
    <div class="flex items-center justify-center">
        <div class="grid grid-cols-4 gap-2 px-16">
            @foreach($categories as $category)
            <div class="flex flex-col gap-1">
                <!-- Image -->
                <a href="/devices/{{$category->categories_id}}" class="bg-purple-500 w-[285px] h-[380px]">
                    <img src="{{$category->photo_url}}" class="hover:translate-x-1 hover:-translate-y-1 delay-50 duration-100 object-cover h-full w-full" />
                </a>
                <!-- Title -->
                <a href="/devices/{{$category->categories_id}}" class="hover:text-purple-500 text-black font-semibold"> {{$category->name}} </a>
            </div>
                @endforeach
        </div>
    </div>
@endsection
