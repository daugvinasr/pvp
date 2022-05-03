@extends('layouts.base')
@section('content')
    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if (exist) {
            alert(msg);
        }
    </script>
    <div class="h-screen bg-gray-100 justify-center">
        <div class="py-1 px-4 w-100 mt-20 bg-white rounded shadow-xl">
            @foreach($comments as $comment)
                <div>
                    <div class="flex justify-center">
                        <div class="max-w-3xl">
                            <div class="p-4 rounded-lg shadow-lg bg-white m-4 w-[700px]">
                                <div class="flex flex-col">
                                    <p class="text-gray-500 font-medium mb-6 break-words">{{$comment->content}}</p>
                                    <p class="text-gray-500 text-right">{{$comment->username}} {{$comment->timestamp}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div>
                <div class="flex justify-center p-4">
                    <div class="max-w-3xl">
                        <form method="POST" class="w-full max-w-xl bg-white rounded-lg px-4 pt-2">
                            @csrf
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Parašykite komentarą</h2>
                                <div class="w-full md:w-full px-3 mb-2 mt-2">
                                    <label>
<textarea
    class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
    name="body" placeholder='Komentaras' required></textarea>
                                    </label>
                                </div>
                                <div class="w-full md:w-full flex items-start flex-row-reverse">
                                    <div>
                                        <button
                                            class="cursor-pointer py-2 px-4 block mt-6 bg-indigo-500 text-white font-bold w-full text-center rounded"
                                            type="submit">Komentuoti
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
