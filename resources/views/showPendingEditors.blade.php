@extends('layouts.base')
@section('content')
    <div class="h-screen bg-gray-100 justify-center">
        <section class="container mx-auto p-6 rounded-10">
            <div>
                <section class="container mx-auto p-6 rounded-10">
                    @if(!$editorsData->isEmpty())
                        <h2 class="md:text-3xl font-bold text-center text-gray-500 mb-5">Nepatvirtinti redaktoriai</h2>
                    @else
                        <h2 class="md:text-3xl font-bold text-center text-gray-500">Nėra nepatvirtintų redaktorių</h2>
                    @endif
                    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                        <div class="w-full">
                            <table class="w-full">
                                <thead>
                                @if(!$editorsData->isEmpty())
                                    <tr class="text-md tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                        <th class="px-4 py-3 text-center">Vardas</th>
                                        <th class="px-4 py-3 text-center">Pavardė</th>
                                        <th class="px-4 py-3 text-center">Telefono numeris</th>
                                        <th class="px-4 py-3 text-center">Aprašymas</th>
                                        <th class="px-4 py-3 text-center">Veiksmai</th>
                                    </tr>
                                @endif
                                </thead>

                                @if(!$editorsData->isEmpty())
                                    @foreach($editorsData as $data)
                                        <tbody class="bg-white">
                                        <td class="px-4 py-3 text-ms font-semibold border text-center">{{$data->name}}</td>
                                        <td class="px-4 py-3 text-ms font-semibold border text-center">{{$data->surname}}</td>
                                        <td class="px-4 py-3 text-ms font-semibold border text-center">{{$data->phone_number}}</td>
                                        <td class="px-4 py-3 text-ms font-semibold border text-center">{{$data->description}}</td>
                                        <td class="px-4 py-3 text-ms font-semibold border text-center">
                                            <a
                                                class="cursor-pointer py-2 px-4 block bg-indigo-500 text-white font-bold text-center rounded"
                                                href="/approvePendingEditor/{{$data->editors_id}}"
                                                type="submit">Patvirtinti
                                            </a>
                                        </td>
                                        </tbody>
                                    @endforeach
                                @endif
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </div>
@endsection
