@extends('layouts.base')
@section('content')
    <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-6">
            @foreach($disposals as $location)
            <div class="w-full bg-white rounded-lg sahdow-lg overflow-hidden flex flex-col justify-center items-center">
                <div class=""><iframe src="{{$location->map_link}}" width="520" height="350"></iframe></div>
                <div class="text-center py-4 sm:py-2">
                    <p class="text-xl text-gray-700 font-bold mb-2  ">{{$location->company_name}}</p>
                    <p class="text-base text-gray-900 font-normal bg-yellow-200 rounded-full">{{$location->disposalsToCategories->name}}</p>
                    <p class="text-base text-gray-900 font-normal">{{$location->address}}</p>
                    <p class="text-base text-gray-900 font-normal">Tel. {{$location->phone_number}}</p>
                    <p class="text-base text-gray-900 font-normal mb-2">El. paštas {{$location->email}}</p>
                </div>
            </div>
            @endforeach
        </div>
@endsection
