@extends('layouts.base')
@section('content')
    <div class="mb-16">
        <!-- Code block starts -->
        <dh-component>

            <div class="w-full px-10 pt-20">
                <div class="container mx-auto">
                    <div role="list" class="lg:flex md:flex sm:flex items-center xl:justify-between flex-wrap md:justify-around sm:justify-around lg:justify-around">
                        @foreach($fixersData as $data)
                        <div role="listitem" class="xl:w-1/3 sm:w-3/4 md:w-2/5 relative mt-16 mb-32 sm:mb-24 xl:max-w-sm lg:w-2/5">
                            <div class="rounded overflow-hidden shadow-md bg-white">
                                <div class="absolute -mt-20 w-full flex justify-center">
                                    <div class="h-32 w-32">
                                        <img src="{{$data -> photo_url}}" role="img" class="rounded-full object-cover h-full w-full shadow-md" />
                                    </div>
                                </div>
                                <div class="px-6 mt-16">
                                    <h1 class="font-bold text-3xl text-center mb-1">{{$data -> name}} {{$data -> surname}}</h1>
                                    <p class="text-gray-800 text-sm text-center">{{$data -> specialization}}</p>
                                    <p class="text-center text-gray-600 text-base pt-3 font-normal">{{$data -> description}}</p>
                                    <div class="w-full flex justify-center pt-5 pb-5">
                                        <a href="">
                                            <div aria-label="phone number">
                                                <a>Tel nr.: {{$data -> phone_number}}</a>
                                            </div>
                                        </a>
                                        <a href="" class="mx-1">
                                            <div aria-label="email">
                                                <a>{{$data -> email}}</a>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
        </dh-component>
        <!-- Code block ends -->
    </div>
@endsection
