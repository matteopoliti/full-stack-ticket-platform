@extends('layouts.app')

@section('content')
    <main class="container py-3">
        <h1 class="text-success text-center">Modifica Ticket</h1>
        <form action="{{ route('dashboard.tickets.update', $ticket->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="titolo" class="form-label">Titolo *</label>
                <input type="text"
                    class="form-control @error('titolo')
                    is-invalid
                    @enderror"
                    id="titolo" name="titolo" required max="100" value="{{ old('titolo') ?? $ticket->titolo }}">
                @error('titolo')
                    <div class="alert alert-danger mt-1">

                        {{ $message }}

                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="descrizione" class="form-label">Descrizione</label>
                <textarea class="form-control" id="descrizione" name="descrizione" rows="3">{{ old('descrizione') ?? $ticket->descrizione }}</textarea>
            </div>

            {{-- Operators --}}
            <div class="mb-3">
                <label for="operator_id" class="form-label">Operatore *</label>
                <select
                    class="form-select @error('operator_id')
                    is-invalid
                    @enderror"
                    name="operator_id" id="operator_id">
                    <option>Seleziona uno</option>
                    @foreach ($operators as $item)
                        <option value="{{ $item->id }}"
                            {{ $item->id == old('operator_id', $ticket->operator_id) ? 'selected' : '' }}>
                            {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Stato --}}
            <div class="mb-3">
                <label for="stato" class="form-label">Stato *</label>
                <select class="form-select @error('stato')
                    is-invalid
                    @enderror"
                    name="stato" id="stato">
                    <option value="">Seleziona uno</option>
                    @foreach ($stato_tickets as $item)
                        <option value="{{ $item }}" {{ $item == old('stato', $ticket->stato) ? 'selected' : '' }}>
                            {{ $item }}</option>
                    @endforeach

                </select>
            </div>


            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria *</label>
                <input type="text" class="form-control" id="categoria" name="categoria"
                    value="{{ old('categoria') ?? $ticket->categoria }}" required>
                @error('categoria')
                    <div class="alert alert-danger mt-1">

                        {{ $message }}

                    </div>
                @enderror
            </div>



            <button type="submit" class="btn btn-success w-25 d-block mx-auto">Modifica</button>

            <div class="alert alert-secondary mt-3" role="alert">
                Ricorda di compilare tutti i campi con *
            </div>
        </form>
    </main>
@endsection
