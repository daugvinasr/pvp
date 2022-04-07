@extends('layouts.base')
@section('content')
    <div tabindex="0" class="focus:outline-none">
        <!-- Remove py-8 -->
        <div class="mx-auto container py-8">
            <div class="flex flex-wrap items-center lg:justify-between justify-center">


                @foreach($guides as $guide)
                    <div tabindex="0" class="focus:outline-none mx-2 w-72 mb-8">
                        <div>
                            <img alt="person capturing an image"
                                 src="{{$guide->image_url}}" tabindex="0"
                                 class="focus:outline-none w-full"/>
                            {{--                            //h-50--}}
                        </div>
                        <div class="bg-white">
                            {{--                            <div class="flex items-center justify-between px-4 pt-4">--}}
                            {{--                                                                <div>--}}
                            {{--                                                                    <a href="/readguide">--}}
                            {{--                                                                        <svg xmlns="http://www.w3.org/2000/svg" tabindex="0" class="focus:outline-none"--}}
                            {{--                                                                             width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5"--}}
                            {{--                                                                             stroke="#2c3e50" fill="none" stroke-linecap="round"--}}
                            {{--                                                                             stroke-linejoin="round">--}}
                            {{--                                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>--}}
                            {{--                                                                            <path d="M9 4h6a2 2 0 0 1 2 2v14l-5-3l-5 3v-14a2 2 0 0 1 2 -2"></path>--}}
                            {{--                                                                        </svg>--}}
                            {{--                                                                    </a>--}}
                            {{--                                                                </div>--}}
                            {{--                                --}}
                            {{--                            </div>--}}

                            <div class="flex items-center justify-center py-2">
                                <div class="bg-yellow-200 py-1.5 px-6 rounded-full  ">
                                    <p tabindex="0"
                                       class="focus:outline-none text-xs text-yellow-700">{{$guide->time_required}}
                                        minučių</p>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex items-center">
                                    <h2 tabindex="0"
                                        class="focus:outline-none text-lg font-semibold">{{$guide->title}}</h2>
                                    {{--                                    <p tabindex="0" class="focus:outline-none text-xs text-gray-600 pl-5">prieš 4--}}
                                    {{--                                        dienas</p>--}}
                                </div>
                                <p tabindex="0"
                                   class="focus:outline-none text-xs text-gray-600 mt-2">{{$guide->description}}</p>
                                {{--                                <div class="flex mt-4">--}}
                                {{--                                    <div>--}}
                                {{--                                        <p tabindex="0"--}}
                                {{--                                           class="focus:outline-none text-xs text-gray-600 px-2 bg-gray-200 py-1">Žymė--}}
                                {{--                                            1</p>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="pl-2">--}}
                                {{--                                        <p tabindex="0"--}}
                                {{--                                           class="focus:outline-none text-xs text-gray-600 px-2 bg-gray-200 py-1">Žymė--}}
                                {{--                                            2</p>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                <div class="flex items-center justify-center py-4">
                                    {{--                                    <h2 tabindex="0" class="focus:outline-none text-indigo-700 text-xs font-semibold">--}}
                                    {{--                                        Išlaidos</h2>--}}
                                    <a href="/showGuide/{{$guide->repair_guides_id}}" tabindex="0"
                                       class="focus:outline-none text-indigo-700 text-xl font-semibold">Skaityti</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
    <script src="chrome-extension://kgejglhpjiefppelpmljglcjbhoiplfn/shadydom.js"></script>
    <script>
        if (!window.ShadyDOM) window.ShadyDOM = {force: true, noPatch: true};
    </script>
@endsection
