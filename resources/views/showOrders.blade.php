@extends('layouts.base')
@section('content')
    <div class="h-screen bg-gray-100 justify-center">
        <section class="container mx-auto p-6 rounded-10">
            <div>
                <section class="container mx-auto p-6 rounded-10">
                    @if(!$statusData -> isEmpty())
                    <h2 class="md:text-3xl font-bold text-center text-gray-500">Užsakymų sąrašas</h2>
                    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                        <div class="w-full">
                            <table class="w-full">
                                <thead>
                                <tr class="text-md tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                    <th class="px-4 py-3 text-center">ID</th>
                                    <th class="px-4 py-3 text-center">Laikas</th>
                                    <th class="px-4 py-3 text-center">Užmokestis</th>
                                    <th class="px-4 py-3 text-center">Statusas</th>
                                    <th class="px-4 py-3 text-center">Užsakovas</th>
                                    <th class="px-4 py-3 text-center">Įrenginys</th>
                                    <th class="px-4 py-3 text-center">Veiksmai</th>
                                </tr>
                                </thead>
                                @foreach($statusData as $status)
                                    <tbody class="bg-white">
                                    <td class="px-4 py-3 text-ms font-semibold border text-center">{{ $status->repair_orders_id}}</td>
                                    <td class="px-4 py-3 text-ms font-semibold border text-center">{{ $status->timestamp}}</td>
                                    <td class="px-4 py-3 text-ms font-semibold border text-center">{{ $status->price}}</td>
                                    <td class="px-4 py-3 text-ms font-semibold border text-center">{{ $status->status == '1' ? 'Užsakytas' : ($status->status  == '2' ? 'Tvarkomas' : ($status->status  == '3' ? 'Atliktas' : 'Atšauktas'))}}</td>
                                    <td class="px-4 py-3 text-ms font-semibold border text-center">{{ $status->repairOrdersToUser->username}}</td>
                                    <td class="px-4 py-3 text-ms font-semibold border text-center">{{ $status->repairOrdersToDevice->name}}</td>
                                    <td class="px-4 py-3 text-ms font-semibold border text-center">
                                        @if(session('id_repairman') != null)
                                            <a
                                                class="cursor-pointer py-2 px-4 block bg-indigo-500 text-white font-bold text-center rounded"
                                                href="/changeStatus/{{$status->repair_orders_id}}/{{ $status->status}}"
                                                type="submit">Pakeisti statusą
                                            </a>
                                        @else
                                            <a
                                                class="cursor-pointer py-2 px-4 block bg-indigo-500 text-white font-bold text-center rounded"
                                                href="/cancelOrder/{{$status->repair_orders_id}}/"
                                                type="submit">Atšaukti
                                            </a>
                                        @endif
                                    </td>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    @elseif($statusData -> isEmpty() && session('id_repairman') != null)
                        <h2 class="md:text-3xl font-bold text-center text-gray-500">Šiuo metu neturite remontų.</h2>
                        <p class="p-4 text-gray-700 text-justify">Jei jau ilgą laiką negaunate užsakymų, pabandykite
                        paredaguoti profilio informaciją į patrauklesnę!</p>
                    @elseif($statusData -> isEmpty() && session('id_repairman') == null)
                        <h2 class="md:text-3xl font-bold text-center text-gray-500">Neturite pradėtų/pabaigtų užsakymų.</h2>
                        <p class="p-4 text-gray-700 text-justify">Išbandykite taisytojų paslaugą, arba toliau naudokitės
                        nemokamais elektronikos remonto gidais!</p>
                    @endif
                    @yield('inputFields') <!-- ??? -->
                </section>
            </div>
        </section>
    </div>
@endsection
