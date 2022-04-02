@extends('layouts.base')
@section('content')
    <div class="h-screen bg-gray-100 justify-center">

        <section class="container mx-auto p-6 rounded-10">
            <div>
                <section class="container mx-auto p-6 rounded-10">
                    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                        <div class="w-full">
                            <table class="w-full">
                                <thead>
                                <tr class="text-md tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                    <th class="px-4 py-3 text-center">repair_orders_id</th>
                                    <th class="px-4 py-3 text-center">timestamp</th>
                                    <th class="px-4 py-3 text-center">price</th>
                                    <th class="px-4 py-3 text-center">status</th>
                                    <th class="px-4 py-3 text-center">fk_usersid</th>
                                    <th class="px-4 py-3 text-center">fk_devicesid</th>
                                </tr>
                                </thead>
                                @foreach($statusData as $status)
                                    <tbody class="bg-white">
                                    <td class="px-4 py-3 text-ms font-semibold border text-center">{{ $status->repair_orders_id}}</td>
                                    <td class="px-4 py-3 text-ms font-semibold border text-center">{{ $status->timestamp}}</td>
                                    <td class="px-4 py-3 text-ms font-semibold border text-center">{{ $status->price}}</td>
                                    <td class="px-4 py-3 text-ms font-semibold border text-center">{{ $status->status}}</td>
                                    <td class="px-4 py-3 text-ms font-semibold border text-center">{{ $status->fk_usersid}}</td>
                                    <td class="px-4 py-3 text-ms font-semibold border text-center">{{ $status->fk_devicesid}}</td>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    @yield('inputFields')
                </section>
            </div>
        </section>
    </div>
@endsection
