@extends('layouts.base')
@section('content')
    <section class="container mx-auto rounded-10 relative">
        <h2 class="md:text-3xl font-bold text-center text-gray-500">Jūsų pasirinktas taisytojas</h2>
        <br>
        <div class="rounded mt-20 overflow-hidden shadow-md bg-white">
            <div class="absolute -mt-20 w-full flex justify-center">
                <div class="h-32 w-32">
                    <img src="{{$repairman -> photo_url}}" role="img" class="rounded-full object-cover h-full w-full shadow-md" />
                </div>
            </div>
            <div class="px-6 mt-16">
                <h1 class="font-bold text-3xl text-center mb-1">{{$repairman -> name}} {{$repairman -> surname}}</h1>
                <div class="w-full flex justify-center pt-2 pb-8">
                    <a href="">
                        <div aria-label="phone number">
                            <a>Tel nr.: {{$repairman -> phone_number}}</a>
                        </div>
                    </a>
                    <a href="" class="mx-1">
                        <div aria-label="email">
                            <a>{{$repairman -> email}}</a>
                        </div>
                    </a>
                </div>
                <br>
            </div>
        </div>
        <br>
        <h2 class="md:text-3xl font-bold text-center text-gray-500">Užsakymo informacija</h2>
        <div class="h-screen bg-gray-100 justify-center">
            <div class="py-6 px-8 h-120 w-full mt-10 bg-white rounded shadow-xl">
                <form method="POST">
                    @csrf
                    @if (session('errormessage'))
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                            <p class="font-bold">Klaida!</p>
                            <p>{{ session('errormessage') }}</p>
                        </div>
                    @endif
                    <div class="grid grid-cols-2 gap-4 px-10">
                        <div>
                            <div class="mb-6">
                                <input name="status" type="hidden" value="1">
                                <input name="fk_usersid" type="hidden" value="{{ session('id_user') }}">

                                <label for="username" class="block font-bold">Prisijungimo vardas:</label>
                                <input disabled name="username" type="text" class="w-full border border-gray-200 bg-gray-dark py-2 pl-3 rounded mt-2 outline-none" value="{{ session('username') }}">
                            </div>
                            <div class="mb-6">
                                <label for="fk_devicesid" class="block font-bold">Prietaisas taisymui:</label>
                                <select name="fk_devicesid" class="border border-gray-200 bg-gray-dark py-2 pl-3 rounded mt-2 w-full outline-none">
                                    @foreach($devices as $device)
                                        <option value="{{ $device -> devices_id }}">{{ $device -> name }}</option>
                                    @endforeach
                                </select>
                                <input name="fk_repairmansid" type="hidden" value="{{ $repairman -> repairmans_id }}">
                            </div>
                        </div>
                        <div>
                            <div class="mb-6">
                                <label for="email" class="block font-bold">El. paštas:</label>
                                <input disabled name="email" type="text" class="w-full border border-gray-200 bg-gray-dark py-2 pl-3 rounded mt-2 outline-none" value="{{ session('email') }}">
                            </div>
                            <div class="mb-6">
                                <label for="price" class="block font-bold">Kaina:</label>
                                <input name="price" type="text" class="w-full border border-gray-200 bg-gray-dark py-2 pl-3 rounded mt-2 outline-none" value="19.99" readonly>
                            </div>
                        </div>
                    </div>
                    <p class="text-center text-white">jo žinau, galvojau comment box įdėt kur naudotojas paaiškintų daikto būseną arba sugedimo
                    kategorijas kokias duot pasirinkt bet nenorėjau valanda prieš paskaitą keist duombazės struktūros</p>
                    <button class="py-2 px-4 block mt-6 bg-indigo-600 text-white font-bold w-full text-center rounded" type="submit">Užsakyti remontą!</button>
                </form>
            </div>
        </div>
    </section>
@endsection
