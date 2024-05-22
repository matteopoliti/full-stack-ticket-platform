@extends('layouts.app')

@section('content')
    <main class="container py-3">
        <h1 class="text-success">Projects List</h1>

        <a href="{{ route('dashboard.tickets.create') }}" class="btn btn-primary">+ Create new project</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Stato</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Categoria</th>
                    <th>Modifica</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>

                        <td>{{ $item->stato }}</td>
                        <td><a href="{{ route('dashboard.tickets.show', $item->slug) }}"
                                class="btn btn-outline-secondary">{{ $item->titolo }}</a></td>
                        {{-- <td>{{ $item->titolo }}</td> --}}
                        <td>{{ $item->descrizione }}</td>
                        <td>{{ $item->categoria }}</td>
                        <td class="">
                            <a href="{{ route('dashboard.tickets.edit', $item->slug) }}"
                                class="btn btn-outline-warning">Modifica</a>

                            {{-- <form action="{{ route('dashboard.tickets.destroy', $item->slug) }}" method="POST">
                                @csrf

                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
@endsection
