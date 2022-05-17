@extends('layouts.base')
@section('content')
    <div class="w-full my-12">
        <div class="max-w-5xl mx-auto px-6 sm:px-6 lg:px-8">
            <div class="bg-white w-full shadow rounded p-8">
                <h1 class="md:text-3xl text-2xl font-bold text-indigo-600 my-1">{{$guideInfo->title}}</h1>
                <h2 class="md:text-xl text-xl text-gray-800 my-1">{{$guideInfo->description}}</h2>
                <h2 class="md:text-xl text-xl text-gray-800 my-1">Sunkumas: {{$guideInfo->difficulty}} iš 5</h2>
                <h2 class="md:text-xl text-xl text-gray-800 my-1">Užtruks laiko: {{$guideInfo->time_required}}
                    minučių</h2>
                <h3 class="md:text-lg text-xl text-gray-800 ">Reikalingi įrankiai ir dalys:</h3>
                <div class="mb-4">
                    @foreach($partsInfo as $part)
                        <a href="{{$part->repairGuidesPartsToPart->url}}"
                           class="text-indigo-700">{{$part->repairGuidesPartsToPart->name}} </a><br>
                    @endforeach
                </div>
                @if(session('role')=="admin")
                    <div class="mt-6">
                        <a href="/addStep/{{$guideInfo->repair_guides_id}}"
                           class="bg-indigo-600 px-8 py-2 rounded text-white hover:bg-indigo-500 text-sm">Pridėti
                            žingsnį</a>
                            <a href="/editGuide/{{$guideInfo->repair_guides_id}}"
                               class="bg-indigo-600 px-8 py-2 rounded text-white hover:bg-indigo-500 text-sm ml-4">Redaguoti</a>
                    </div>
                @endif
                <div class="flex flex-row-reverse">
                    <a class="text-indigo-700" href="/showComments/{{$id}}">Komentarai {{$commentsAmount}}</a>
                </div>
                <hr class="my-2 border-t border-gray-200"/>
                <div class="grid grid-cols-1 gap-8 mt-6">
                    @foreach($guide as $item)
                        <div class="flex flex-col md:flex-row">
                            <div class="w-full md:w-6/12 mt-4 md:mt-0 md:ml-4">
                                <h2 class="text-lg leading-tight font-bold text-indigo-600">{{$item->step_number}}
                                    . {{$item->title}}</h2>
                                <p class="leading-normal pt-2">{{$item->description}}</p>
                                @if(session('role')=="admin")
                                <div class="flex flex-row-reverse pr-8 pt-4">
                                <a href="/editStep/{{$item->step_id}}"
                                   class="bg-indigo-600 px-4 py-1 rounded text-white hover:bg-indigo-500 text-xs ml-4">Redaguoti</a>
                                    <a href="/removeStep/{{$item->step_id}}"
                                       class="bg-indigo-600 px-4 py-1 rounded text-white hover:bg-indigo-500 text-xs ml-4">Pašalinti</a>
                                </div>
                                @endif
                            </div>
                            <div class="w-full md:w-6/12 rounded overflow-hidden t">
                                <img class="object w-full h-auto"
                                     src="{{$item->image_url}}" alt="">
                            </div>
                        </div>
                        <hr class="my-4 border-t border-gray-200  rounded-lg w-11/12 place-self-center"/>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
