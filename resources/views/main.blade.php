@extends('layouts.base')
@section('content')
    <div class="justify-center items-center">
        <div class="2xl:mx-auto 2xl:container lg:px-20 md:px-6 px-4 w-96 sm:w-auto">
            <div role="main" class="flex flex-col items-center justify-center">
            </div>
            <div class="lg:flex items-stretch md:mt-12 mt-8">
                <div class="lg:w-1/2">
                    <div class="sm:flex items-center justify-between xl:gap-x-8 gap-x-6">
                        <div class="sm:w-1/2 relative">
                            <div>
                                <p class="p-6 text-xs font-medium leading-3 text-white absolute top-0 right-0">{{$data[0]->date}}</p>
                                <div class="absolute bottom-0 left-0 p-6">
                                    <h2 class="text-xl font-semibold 5 text-white">{{$data[0]->title}}</h2>
                                    <a href="javascript:void(0)"
                                       class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                                        <p class="pr-2 text-sm font-medium leading-none">Skaityti</p>
                                        <svg class="fill-stroke" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor" stroke-width="2"
                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <img src="{{$data[0]->picture}}" class="w-full" alt="chair"/>
                        </div>
                        <div class="sm:w-1/2 sm:mt-0 mt-4 relative">
                            <div>
                                <p class="p-6 text-xs font-medium leading-3 text-white absolute top-0 right-0">{{$data[1]->date}}</p>
                                <div class="absolute bottom-0 left-0 p-6">
                                    <h2 class="text-xl font-semibold 5 text-white">{{$data[1]->title}}</h2>
                                    <a href="javascript:void(0)"
                                       class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                                        <p class="pr-2 text-sm font-medium leading-none">Skaityti</p>
                                        <svg class="fill-stroke" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor" stroke-width="2"
                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <img src="{{$data[1]->picture}}" class="w-full" alt="wall design"/>
                        </div>
                    </div>
                    <div class="relative">
                        <div>
                            <p class="md:p-10 p-6 text-xs font-medium leading-3 text-white absolute top-0 right-0">{{$data[2]->date}}</p>
                            <div class="absolute bottom-0 left-0 md:p-10 p-6">
                                <h2 class="text-xl font-semibold 5 text-white">{{$data[2]->title}}</h2>
                                <a href="javascript:void(0)"
                                   class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                                    <p class="pr-2 text-sm font-medium leading-none">Skaityti</p>
                                    <svg class="fill-stroke" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor" stroke-width="2"
                                              stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <img src="{{$data[2]->picture}}" alt="sitting place"
                             class="w-full mt-8 md:mt-6 hidden sm:block"/>
                        <img class="w-full mt-4 sm:hidden" src="https://i.ibb.co/6XYbN7f/Rectangle-29.png"
                             alt="sitting place"/>
                    </div>
                </div>
                <div class="lg:w-1/2 xl:ml-8 lg:ml-4 lg:mt-0 md:mt-6 mt-4 lg:flex flex-col justify-between">
                    <div class="relative">
                        <div>
                            <p class="md:p-10 p-6 text-xs font-medium leading-3 text-white absolute top-0 right-0">{{$data[3]->date}}</p>
                            <div class="absolute bottom-0 left-0 md:p-10 p-6">
                                <h2 class="text-xl font-semibold 5 text-white">{{$data[3]->title}}</h2>
                                <a href="javascript:void(0)"
                                   class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                                    <p class="pr-2 text-sm font-medium leading-none">Skaityti</p>
                                    <svg class="fill-stroke" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor" stroke-width="2"
                                              stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <img src="{{$data[3]->picture}}" alt="sitting place"
                             class="w-full sm:block hidden"/>
                        <img class="w-full sm:hidden" src="https://i.ibb.co/dpXStJk/Rectangle-29.png"
                             alt="sitting place"/>
                    </div>
                    <div class="sm:flex items-center justify-between xl:gap-x-8 gap-x-6 md:mt-6 mt-4">
                        <div class="relative w-full">
                            <div>
                                <p class="p-6 text-xs font-medium leading-3 text-white absolute top-0 right-0">{{$data[4]->date}}</p>
                                <div class="absolute bottom-0 left-0 p-6">
                                    <h2 class="text-xl font-semibold 5 text-white">{{$data[4]->title}}</h2>
                                    <a href="javascript:void(0)"
                                       class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                                        <p class="pr-2 text-sm font-medium leading-none">Skaityti</p>
                                        <svg class="fill-stroke" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor" stroke-width="2"
                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <img src="{{$data[4]->picture}}" class="w-full" alt="chair"/>
                        </div>
                        <div class="relative w-full sm:mt-0 mt-4">
                            <div>
                                <p class="p-6 text-xs font-medium leading-3 text-white absolute top-0 right-0">{{$data[5]->date}}</p>
                                <div class="absolute bottom-0 left-0 p-6">
                                    <h2 class="text-xl font-semibold 5 text-white">{{$data[5]->title}}</h2>
                                    <a href="javascript:void(0)"
                                       class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                                        <p class="pr-2 text-sm font-medium leading-none">Skaityti</p>
                                        <svg class="fill-stroke" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor" stroke-width="2"
                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <img src="{{$data[5]->picture}}" class="w-full" alt="wall design"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
