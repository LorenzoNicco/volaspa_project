@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-center mb-5 font-extrabold text-4xl">Cerca un film</h1>

                    {{-- Contenitore forms --}}
                    <div class="flex justify-around items-center">
                        {{-- Sezione ricerca tramite titolo --}}
                        <div class="">
                            <h2 class="text-center font-semibold text-lg mb-3">Ricerca tramite titolo</h2>
    
                            <form action="{{ route('movie.getMovie') }}" method="POST" class="flex items-center">
                                @csrf
        
                                <input type="text" name="title" class="input input-bordered me-2" required>
        
                                <input type="submit" class="btn btn-info text-white" value="Invia">
                            </form>
                        </div>
    
                        {{-- Sezione ricerca tramite id --}}
                        <div>
                            <h2 class="text-center font-semibold text-lg mb-3">Ricerca tramite IMDB ID</h2>
    
                            <form action="{{ route('movie.getMovie') }}" method="POST" class="flex items-center">
                                @csrf
        
                                <input type="text" name="id" class="input input-bordered me-2" required>
        
                                <input type="submit" class="btn btn-info text-white" value="Invia">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
@endsection
