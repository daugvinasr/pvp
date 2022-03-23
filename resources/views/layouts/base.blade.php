<!DOCTYPE html>
<html lang="lt">
<title></title>
<meta charset="utf-8" />
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<body>
<header>
    <nav>
        <div class="">
            <div class="flex justify-between h-16 px-10 shadow items-center">
                <div class="flex items-center space-x-8">
                    <a href="/"><h1 class="text-xl lg:text-2xl font-bold cursor-pointer">Pavadinimas</h1></a>
                    <div class="hidden md:flex justify-around space-x-4">
                        <a href="/guides" class="hover:text-indigo-600 text-gray-700">Taisymo gidai</a>
                    </div>
                    <div class="hidden md:flex justify-around space-x-4">
                        <a href="/fixers" class="hover:text-indigo-600 text-gray-700">Taisytojai</a>
                    </div>
                    <div class="hidden md:flex justify-around space-x-4">
                        <a href="/locations" class="hover:text-indigo-600 text-gray-700">Utilizavimo vietos</a>
                    </div>
                </div>
                <div class="flex space-x-4 items-center">
                    @if(session('id_user')==null)
                        <a href="/login" class="text-gray-800 text-sm">Prisijungti</a>
                        <a href="/register" class="bg-indigo-600 px-4 py-2 rounded text-white hover:bg-indigo-500 text-sm">Registruotis</a>
                    @else
                        <a href="#" class="hover:text-indigo-600 text-gray-700">Sveiki, {{session('username')}}</a>
                        <a href="/logout" class="bg-indigo-600 px-4 py-2 rounded text-white hover:bg-indigo-500 text-sm">Atsijungti</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
</header>
<div class="h-screen bg-gray-100 flex justify-center">
    @yield('content')
</div>
</body>
</html>
