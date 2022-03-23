@extends('layouts.base')
@section('content')
    <div class="w-full my-12">
        <div class="max-w-5xl mx-auto px-6 sm:px-6 lg:px-8">
            <div class="bg-white w-full shadow rounded p-8">
                <h1 class="md:text-3xl text-2xl font-bold text-indigo-600">Taisymo gido pavadinimas</h1>
                <h2 class="md:text-xl text-xl text-gray-800">Aprašymas</h2>
                <h3 class="md:text-lg text-xl text-gray-800">Reikalingi įrankiai ir dalys</h3>
                <div class="grid grid-cols-1 gap-8 mt-6">
                    <div class="flex flex-col md:flex-row">
                        <div class="w-full md:w-6/12 rounded overflow-hidden">
                            <img class="object w-full h-auto" src="https://guide-images.cdn.ifixit.com/igi/tcR1uWhloXSYUGWG.huge" alt="">
                        </div>
                        <div class="w-full md:w-6/12 mt-4 md:mt-0 md:ml-4">
                            <h2 class="text-lg font-semibold leading-tight font-bold text-indigo-600">1 žingsnis Pavadinimas</h2>
                            <p class="leading-normal pt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, amet dicta enim facere, illum natus nobis placeat quo quos soluta temporibus, tenetur veritatis vitae voluptatum!</p>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row">
                        <div class="w-full md:w-6/12 rounded overflow-hidden">
                            <img class="object w-full h-auto" src="https://guide-images.cdn.ifixit.com/igi/xnZlEQywPJtGtgiK.huge" alt="">
                        </div>
                        <div class="w-full md:w-6/12 mt-4 md:mt-0 md:ml-4">
                            <h2 class="text-lg font-semibold leading-tight font-bold text-indigo-600">2 žingsnis Pavadinimas</h2>
                            <p class="leading-normal pt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur dolorum id quos veritatis. A accusantium aliquid amet atque, beatae blanditiis consequatur ea officia quis suscipit.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
