@extends('layouts.base')
@section('content')
    <section class="container mx-auto p-6 rounded-10">
        <h2 class="md:text-3xl font-bold text-center text-gray-500 mb-8">Pasirinkite kategoriją<br></h2>
        <div class="flex items-center justify-center">
            <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 gap-2 px-16 ">
                @foreach($categories as $category)
                    <div class="flex flex-col gap-1 ">
                        <!-- Card -->
                        <a class="w-[200px] h-[290px] delay-50 duration-100 bg-white hover:bg-gray-100 p-5 rounded-lg group shadow-md"
                           href="/devices/{{$category->categories_id}}">
                            <!-- Image Cover -->
                            <div class="w-[160px] h-[212px]">
                                <img class="rounded shadow object-cover h-full w-full" src="{{$category->photo_url}}"/>
                            </div>
                            <!-- Title -->
                            <h3 class="text-black font-bold mt-2 text-center">{{$category->name}}</h3>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="flex items-center justify-center py-20">
            @if(session('role')=="admin")
                <a href="/addCategories"
                   class="bg-indigo-600 px-8 py-2 rounded text-white hover:bg-indigo-500 text-sm">Pridėti kategoriją</a>
            @endif
        </div>
    </section>
@endsection





{{--@extends('layouts.base')--}}
{{--@section('content')--}}
{{--    @if(session('role')=="admin")--}}
{{--        <div class="absolute left-96 mt-8">--}}
{{--            <a href="/addCategories"--}}
{{--               class="bg-indigo-600 px-8 py-2 rounded text-white hover:bg-indigo-500 text-sm">Pridėti kategoriją</a>--}}
{{--        </div>--}}
{{--    @endif--}}
{{--    <section class="container mx-auto p-6 rounded-10">--}}
{{--        <h2 class="md:text-3xl font-bold text-center text-gray-500">Pasirinkite kategoriją<br><br></h2>--}}
{{--        <div class="flex items-center justify-center">--}}
{{--            <div class="grid grid-cols-4 gap-2 px-16">--}}
{{--                @foreach($categories as $category)--}}
{{--                <div class="flex flex-col gap-1">--}}
{{--                    <!-- Image -->--}}
{{--                    <a href="/devices/{{$category->categories_id}}" class="bg-purple-500 w-[285px] h-[380px]">--}}
{{--                        <img src="{{$category->photo_url}}" class="hover:translate-x-1 hover:-translate-y-1 delay-50 duration-100 object-cover h-full w-full" />--}}
{{--                    </a>--}}
{{--                    <!-- Title -->--}}
{{--                    <a href="/devices/{{$category->categories_id}}" class="hover:text-purple-500 text-black font-semibold"> {{$category->name}} </a>--}}
{{--                </div>--}}
{{--                    @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--@endsection--}}
