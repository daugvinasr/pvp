<!DOCTYPE html>
<html lang="lt">
<title>TaiSau</title>
<meta charset="utf-8"/>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<style>
    *::-webkit-scrollbar {
        display: none;
    }

    /* Hide scrollbar for IE, Edge and Firefox */
    * {
        -ms-overflow-style: none; /* IE and Edge */
        scrollbar-width: none; /* Firefox */
    }
</style>
<body>
<header>
    <nav>
        <div class="">
            <div class="flex justify-between h-16 px-10 shadow items-center">
                <div class="flex items-center space-x-8">
                    <a href="/"><img src="https://i.ibb.co/BB57M4y/logo.jpg"></a>
                    <div class="hidden md:flex justify-around space-x-4">
                        <a href="/categories" class="hover:text-indigo-600 text-gray-700">Taisymo gidai</a>
                    </div>
                    <div class="hidden md:flex justify-around space-x-4">
                        <a href="/fixers" class="hover:text-indigo-600 text-gray-700">Taisytojai</a>
                    </div>
                    <div class="hidden md:flex justify-around space-x-4">
                        <a href="/locations" class="hover:text-indigo-600 text-gray-700">Utilizavimo vietos</a>
                    </div>
                    <div class="hidden md:flex justify-around space-x-4">
                        <a href="/showParts" class="hover:text-indigo-600 text-gray-700">Įrankiai ir dalys</a>
                    </div>
                    @if(session('role') == 'user' && session('id_repairman') == null)
                        <div class="hidden md:flex justify-around space-x-4">
                            <a href="/showOrders" class="hover:text-indigo-600 text-gray-700">Jūsų užsakymai</a>
                        </div>
                    @elseif(session('role') == 'admin')
                        <div class="hidden md:flex justify-around space-x-4">
                            <a href="/showOrders" class="hover:text-indigo-600 text-gray-700">Visi užsakymai</a>
                        </div>
                        <div class="hidden md:flex justify-around space-x-4">
                            <a href="/showNotApproved" class="hover:text-indigo-600 text-gray-700">Nepatvirtinti taisytojai</a>
                        </div>
                    @elseif(session('id_repairman') != null)
                        <div class="hidden md:flex justify-around space-x-4">
                            <a href="/showOrders" class="hover:text-indigo-600 text-gray-700">Jūsų remontai</a>
                        </div>
                    @endif
                </div>
                <div class="flex space-x-4 items-center">
                    @if(session('id_user') == null)
                        <a href="/login" class="text-gray-800 text-sm">Prisijungti</a>
                        <a href="/register"
                           class="bg-indigo-600 px-4 py-2 rounded text-white hover:bg-indigo-500 text-sm">Registruotis</a>
                    @else
                        <a href="/profile/{{session('id_user')}}"
                           class="hover:text-indigo-600 text-gray-700">Sveiki, {{session('username')}}</a>
                        <a href="/logout"
                           class="bg-indigo-600 px-4 py-2 rounded text-white hover:bg-indigo-500 text-sm">Atsijungti</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
</header>
<div class="overflow-auto flex h-screen bg-gray-100 justify-center">
    @yield('content')
</div>
</body>
</html>
