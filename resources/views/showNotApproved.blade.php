@extends('layouts.base')
@section('content')
    <div class="h-screen bg-gray-100 justify-center">
        <section class="container mx-auto p-6 rounded-10">
            <div>
                <section class="container mx-auto p-6 rounded-10">
                    @if(!$fixersData->isEmpty())
                        <h2 class="md:text-3xl font-bold text-center text-gray-500">Nepatvirtinti taisytojai</h2>
                    @else
                        <h2 class="md:text-3xl font-bold text-center text-gray-500">Nėra nepatvirtintų taisytojų</h2>
                    @endif
                    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                        <div class="w-full">
                            <table class="w-full">
                                <thead>
                                @if(!$fixersData->isEmpty())
                                    <tr class="text-md tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                        <th class="px-4 py-3 text-center">Vardas</th>
                                        <th class="px-4 py-3 text-center">Pavardė</th>
                                        <th class="px-4 py-3 text-center">Miestas</th>
                                        <th class="px-4 py-3 text-center">Telefono numeris</th>
                                        <th class="px-4 py-3 text-center">Aprašymas</th>
                                        <th class="px-4 py-3 text-center">Veiksmai</th>
                                    </tr>
                                @endif
                                </thead>
                                <tbody class="bg-white">
                                @if(!$fixersData->isEmpty())
                                    @foreach($fixersData as $data)
                                        <td class="px-4 py-3 text-ms font-semibold border text-center">{{$data->name}}</td>
                                        <td class="px-4 py-3 text-ms font-semibold border text-center">{{$data->surname}}
                                        </td>
                                        <td class="px-4 py-3 text-ms font-semibold border text-center">{{$data->city}}
                                        </td>
                                        <td class="px-4 py-3 text-ms font-semibold border text-center">{{$data->phone_number}}
                                        </td>
                                        <td class="px-4 py-3 text-ms font-semibold border text-center">{{$data->description}}
                                        </td>
                                        <td class="px-4 py-3 text-ms font-semibold border text-center">
                                            <a
                                                class="cursor-pointer py-2 px-4 block bg-indigo-500 text-white font-bold text-center rounded"
                                                href="/approveNotApproved/{{$data->repairmans_id}}"
                                                type="submit">Patvirtinti
                                            </a>
                                        </td>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{--                    @yield('inputFields') <!-- ??? -->--}}
                </section>
            </div>
        </section>
    </div>
@endsection
