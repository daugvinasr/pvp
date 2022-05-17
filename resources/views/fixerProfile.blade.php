@extends('layouts.base')
@section('content')
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet"
          href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

    <main class="profile-page">
        <section class="relative block h-600-px">
            <div class="absolute top-2 w-full h-full bg-center bg-cover rounded-2xl"
                 style="background-image: url('https://images.unsplash.com/photo-1562408590-e32931084e23?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80');">
                <span id="blackOverlay" class="w-full h-full absolute opacity-60 bg-black rounded-2xl"></span>
            </div>
            <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px"
                 style="transform: translateZ(0px)">
                <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg"
                     preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                    <polygon class="text-blueGray-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </section>
        <section class="relative py-4 bg-blueGray-200 rounded-b-2xl">
            <div class="container mx-auto px-4">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white w-9/12 mb-6 shadow-xl rounded-lg -mt-96 ml-40">
                    <div class="px-6">
                        <div class="flex flex-wrap justify-center">
                            <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
                                <div class="relative">
                                    <img alt="..." src="{{$fixerData[0]->photo_url}}"
                                         class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px">
                                </div>
                            </div>
                            <div class="flex w-full lg:w-4/12 px-4 lg:order-3 lg:text-center lg:self-center">
                                <div class="py-6 pl-20 mt-32 sm:mt-0">
                                    Įvertis
                                    @if($rating == 1)
                                        @include('partials.1star')
                                    @elseif($rating == 2)
                                        @include('partials.2star')
                                    @elseif($rating == 3)
                                        @include('partials.3star')
                                    @elseif($rating == 4)
                                        @include('partials.4star')
                                    @elseif($rating == 5)
                                        @include('partials.5star')
                                    @else
                                        @include('partials.0star')
                                    @endif
                                </div>
                            </div>
                            <div class="w-full lg:w-4/12 px-4 lg:order-1">
                                <div class="flex justify-center py-4 lg:pt-4 pt-8">
                                    <div class="mr-4 p-3 text-center">
                                        <span
                                            class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{$ordercount}}</span>
                                        <span class="text-sm text-blueGray-400">Užsakymai</span>
                                    </div>
                                    <div class="mr-4 p-3 text-center">
                                        <a href="/showFixerComments/{{$fixerData[0]->repairmans_id}}"
                                           class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{$commentcount}}</a>
                                        <a href="/showFixerComments/{{$fixerData[0]->repairmans_id}}"
                                           class="text-sm text-blueGray-400">Atsiliepimai</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-12">
                            <h3 class="text-4xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2">
                                {{$fixerData[0]->name}} {{$fixerData[0]->surname}}
                            </h3>
                            <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
                                <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>
                                {{$fixerData[0]->city}}, Lietuva
                            </div>
                            <div class="mb-2 text-blueGray-600 mt-10">
                                <i class="fa fa-envelope mr-2 text-lg text-blueGray-400"></i>{{$fixerData[0]->email}}
                            </div>
                            <div class="mb-2 text-blueGray-600">
                                <i class="fa fa-phone mr-2 text-lg text-blueGray-400"></i>{{$fixerData[0]->phone_number}}
                            </div>
                            <div class="mb-2 text-blueGray-600">
                                @if($fixerData[0]->approved == 0)
                                    <i class="fa fa-minus mr-2 text-lg"></i>Nepatvirtintas
                                @elseif($fixerData[0]->approved == 1)
                                    <i class="fa fa-check mr-2 text-lg text-green-400"></i>Patvirtintas
                                @endif
                            </div>
                        </div>
                        <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
                            <div class="flex flex-wrap justify-center">
                                <div class="w-full lg:w-9/12 px-4">
                                    <p class="mb-4 text-lg leading-relaxed text-blueGray-700">
                                        {{$fixerData[0]->description}}
                                    </p>
                                    @if(session('id_repairman') == null && session('id_user') != null)
                                        <a href="/addOrder/{{$fixerData[0] -> repairmans_id}}"
                                           class="bg-indigo-600 px-6 py-2 rounded text-white hover:bg-indigo-500">Pasirinkti</a>
                                    @endif
                                    @if(session('id_repairman') == $fixerData[0]->repairmans_id || session('role') == 'admin')
                                        <a href="/fixerProfileEdit/{{$fixerData[0] -> repairmans_id}}"
                                           class="bg-indigo-600 px-6 py-2 rounded text-white hover:bg-indigo-500">Redaguoti</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
