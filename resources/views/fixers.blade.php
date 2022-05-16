@extends('layouts.base')
@section('content')
    <div class="mb-16">
        <div class="w-full px-10 pt-20">
            @if(session('role') == 'user' && session('id_repairman') == null)
                <h2 class="md:text-3xl font-bold text-center text-gray-500">Suprantame, kad laikas jums brangus.</h2>
                <p class="p-4 text-gray-700 text-justify mb-2">Suteikiame jums ypatingą paslaugą:<br>
                    Išsirinkite jums tinkamą elektronikos remonto specialistą, pradėkite užsakymą ir gaukite veikiantį
                    elektronikos prietaisą atgal į rankas per specialisto nurodytą laiką!<br>
                    Prietaiso remonto metu, jo būseną galėsite stebėti
                    <a href="/showOrders" class="hover:text-indigo-600 underline text-gray-700">Jūsų užsakymų</a>
                    skyrelyje!</p>
            @elseif(session('id_repairman') != null)
                <h2 class="md:text-3xl font-bold text-center text-gray-500">Sveiki, <i>{{session('username')}}</i>.</h2>
                <p class="p-4 text-gray-700 text-justify mb-2">Žemiau pateikiamas visų remontininkų sąrašas. Naudotojai
                    renkasi
                    patikusius taisytojus šiame skyrelyje, tad įsitikinkite, kad atrodote profesionaliai ir
                    patikimai!</p>
            @endif
            <div class="container mx-auto">
                <div role="list" class="flex flex-col items-center xl:justify-between justify-around">
                    @foreach($fixersData as $data)
                        <div role="listitem"
                             class="xl:w-96 sm:w-3/4 md:w-2/5 relative mt-16 mb-32 sm:mb-24 xl:max-w-sm lg:w-1/3 mx-2">
                            <div class="rounded overflow-hidden shadow-md bg-white">
                                <div class="absolute -mt-20 w-full flex justify-center">
                                    <div class="h-32 w-32">
                                        <img src="{{$data -> photo_url}}" role="img"
                                             class="rounded-full object-cover h-full w-full shadow-md"/>
                                    </div>
                                </div>
                                <div class="px-6 mt-12">
                                    <h1 class="font-bold text-3xl text-center mb-1 py-2">{{$data -> name}} {{$data -> surname}}</h1>
                                    @foreach($data -> repairmansToCategories as $test)
                                        <div class="py-1">
                                            <p class="text-gray-800 text-sm text-center bg-indigo-100 rounded-full mb-1 py-1">{{$test->repairmancategoriesToCategories->name}}</p>
                                        </div>
                                    @endforeach
                                    <div class="pt-2">
                                        <a href="/fixerProfile/{{$data -> repairmans_id}}">
                                            <button class="hover:text-gray-200 py-2 px-4 block bg-indigo-500
                                text-white font-bold w-full text-center rounded" type="submit">Plačiau
                                            </button>
                                        </a>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
