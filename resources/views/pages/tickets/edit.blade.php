@extends('layouts.app')

@section('content')
    <main class="container py-3">
        <h1 class="text-success text-center">Modifica Stato Ticket</h1>
        <form action="{{ route('dashboard.tickets.update', $ticket->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

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

            <button type="submit" class="btn btn-success w-25 d-block mx-auto">Modifica</button>

            <div class="alert alert-secondary mt-3" role="alert">
                Ricorda di compilare tutti i campi con *
            </div>
        </form>
    </main>
@endsection
