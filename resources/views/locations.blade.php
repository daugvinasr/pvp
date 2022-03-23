@extends('layouts.base')
@section('content')
    <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-6">
            <div class="w-full bg-white rounded-lg sahdow-lg overflow-hidden flex flex-col justify-center items-center">
                <div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d73431.45995148578!2d23.857224168249825!3d54.8900535912028!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46e72270b167d343%3A0x614bd1e0c7378bbc!2sKaunas!5e0!3m2!1slt!2slt!4v1648037248675!5m2!1slt!2slt" width="520" height="350"></iframe>
                </div>
                <div class="text-center py-8 sm:py-6">
                    <p class="text-xl text-gray-700 font-bold mb-2">Įmonės pavadinimas</p>
                    <p class="text-base text-gray-400 font-normal">Specializacija</p>
                    <p class="text-base text-gray-400 font-normal">Adresas</p>
                    <a href="" class="hover:text-indigo-600 text-indigo-700">Nuoroda</a>
                </div>
            </div>
            <div class="w-full bg-white rounded-lg sahdow-lg overflow-hidden flex flex-col justify-center items-center">
                <div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d147552.08651305066!2d25.11295230284011!3d54.70080208729963!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dd93fb5c6408f5%3A0x400d18c70e9dc40!2sVilnius!5e0!3m2!1slt!2slt!4v1648037899805!5m2!1slt!2slt" width="520" height="350"></iframe>
                </div>
                <div class="text-center py-8 sm:py-6">
                    <p class="text-xl text-gray-700 font-bold mb-2">Įmonės pavadinimas</p>
                    <p class="text-base text-gray-400 font-normal">Specializacija</p>
                    <p class="text-base text-gray-400 font-normal">Adresas</p>
                    <a href="" class="hover:text-indigo-600 text-indigo-700">Nuoroda</a>
                </div>
            </div>
        </div>
    </section>
@endsection
