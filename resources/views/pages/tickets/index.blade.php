@extends('layouts.app')

@section('content')
    <main class="container py-3">
        <h1 class="text-danger">Ticket List</h1>

        <a href="{{ route('dashboard.tickets.create') }}" class="btn btn-outline-primary">+ New Ticket</a>
        <table class="table">
            <thead>
                <tr>

                    <th scope="col">Titolo</th>
                    <th scope="col">Stato</th>
                    <th>Modifica Stato</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $item)
                    <tr>

                        <td><a href="{{ route('dashboard.tickets.show', $item->slug) }}"
                                class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">{{ $item->titolo }}</a>
                        </td>
                        {{-- <td>{{ $item->titolo }}</td> --}}
                        <td>{{ $item->stato }}</td>
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
