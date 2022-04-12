@extends('layouts.base')
@section('content')
    <div class="w-full my-12">
        <div class="mx-auto container py-8">
            <div class="flex flex-wrap items-center lg:justify-between justify-center">

                @foreach($parts as $part)
                    <div tabindex="0" class="focus:outline-none mx-2 w-72 mb-8">
                        <div>
                            <img alt="person capturing an image"
                                 src="{{$part->picture}}" tabindex="0"
                                 class="focus:outline-none w-full"/>
                        </div>
                        <div class="bg-white">
                            <div class="flex items-center justify-center py-2">
                                {{--                                <div class="bg-yellow-200 py-1.5 px-6 rounded-full  ">--}}
                                {{--                                    <p tabindex="0"--}}
                                {{--                                       class="focus:outline-none text-xs text-yellow-700">aaaa--}}
                                {{--                                        minučių</p>--}}
                                {{--                                </div>--}}
                            </div>
                            <div class="p-4">
                                <div class="flex items-center">
                                    <h2 tabindex="0"
                                        class="focus:outline-none text-lg font-semibold">{{$part->name}}</h2>
                                </div>
                                {{--                                <p tabindex="0"--}}
                                {{--                                   class="focus:outline-none text-xs text-gray-600 mt-2">bbbbbb</p>--}}
                                <div class="flex items-center justify-center py-4">
                                    <a href="{{$part->url}}" tabindex="0"
                                       class="focus:outline-none text-indigo-700 text-xl font-semibold">Pirkti</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
