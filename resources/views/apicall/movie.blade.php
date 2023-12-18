@extends('layouts.app')

@section('content')
    <div class="pt-12">
        <!-- Hero con le info sul film -->
        <div class="hero rounded-lg w-10/12 bg-base-200 mx-auto">
            <div class="hero-content flex-col lg:flex-row">
                @if ($movie['Response'] == 'False')
                    {{-- Se la ricerca non ha avuto successo comparirà questo messaggio --}}
                    <div class="text-center">
                        <h1 class="text-4xl font-bold mb-5">Film non trovato</h1>
    
                        <p>La tua ricerca non ha avuto successo, torna alla dashboard e riprova!</p>

                        <a href="{{ route('dashboard') }}" class="btn btn-primary mt-10">Torna alla Dashboard</a>
                    </div>
                @elseif ($movie['Response'] == 'True' && $flag == true)
                    <div class="flex flex-col lg:flex-row flex-wrap grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
                        {{-- Se la ricerca ha avuto successo e si è cercato per titolo, verranno mostrati i film in lista --}}
                        @foreach ($movie['Search'] as $singleMovie)
                            <div class="bg-base-100 shadow-xl">
                                <!-- Locandina del film -->
                                <figure>
                                    <img src="{{ $singleMovie['Poster'] }}" alt="Immagine non trovata" />
                                </figure>

                                <div class="card-body">
                                    <!-- Titolo del film -->
                                    <h2 class="card-title">{{ $singleMovie['Title'] }}</h2>

                                    <div class="card-actions justify-end">
                                        <button class="btn btn-primary" onclick="my_modal_{{ $singleMovie['imdbID'] }}.showModal()">Info</button>

                                        <!-- Modale per mostrare i dati dei film -->
                                        <dialog id="my_modal_{{ $singleMovie['imdbID'] }}" class="modal">
                                            <div class="modal-box">
                                                <h3 class="font-bold text-lg">{{ $singleMovie['Title'] }}</h3>

                                                <ul>
                                                    <!-- Anno -->
                                                    <li class="flex">
                                                        <h3 class="font-bold me-2">Anno di uscita:</h3>
                        
                                                        <p>{{ $singleMovie['Year'] }}</p>
                                                    </li>
                        
                                                    <!-- Imdb ID -->
                                                    <li class="flex">
                                                        <h3 class="font-bold me-2">Imdb ID:</h3>
                        
                                                        <p>{{ $singleMovie['imdbID'] }}</p>
                                                    </li>
                                                </ul>

                                                <!-- Pulsante di chiusura modale -->
                                                <div class="modal-action">
                                                    <form method="dialog">
                                                        <button class="btn btn-warning">Chiudi</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </dialog>
                                    </div>
                                </div>
                            </div>
                        @endforeach                        
                    </div>
                @elseif ($movie['Response'] == 'True' && $flag == false)
                    {{-- Se la ricerca ha avuto successo e si è cercato per id, verranno mostrati i dati del film --}}
                    <!-- Locandina -->
                    <img src="{{ $movie['Poster'] }}" class="max-w-sm rounded-lg shadow-2xl" alt="Immagine non trovata" />
            
                    <div class="self-stretch flex flex-col">
                        <!-- Titolo -->
                        <h1 class="text-4xl font-bold">{{ $movie['Title'] }}</h1>

                        <!-- Trama -->
                        <div class="flex py-6">
                            <h3 class="font-bold me-2">Trama:</h3>
                            
                            <p>{{ $movie['Plot'] }}</p>
                        </div>

                        <ul>
                            <!-- Regia -->
                            <li class="flex">
                                <h3 class="font-bold me-2">Regia:</h3>

                                <p>{{ $movie['Director'] }}</p>
                            </li>

                            <!-- Cast -->
                            <li class="flex">
                                <h3 class="font-bold me-2">Cast:</h3>

                                <p>{{ $movie['Actors'] }}</p>
                            </li>

                            <!-- ID -->
                            <li class="flex">
                                <h3 class="font-bold me-2">IMDB ID:</h3>

                                <p>{{ $movie['imdbID'] }}</p>
                            </li>
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection