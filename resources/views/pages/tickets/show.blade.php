@extends('layouts.app')

@section('content')
    <main class="container py-3">
        <h1 class=" text-uppercase ">
            {{ $ticket->titolo }}
        </h1>


        <p><strong>Stato:</strong> {{ $ticket->stato }}</p>


        <p><strong>Operatore:</strong> {{ $ticket->operator->name }}</p>


        @if ($ticket->descrizione)
            <p><strong>Descrizione:</strong> {{ $ticket->descrizione }}</p>
        @endif

        <p><strong>Categoria:</strong> {{ $ticket->category->name }}</p>

    </main>
@endsection
