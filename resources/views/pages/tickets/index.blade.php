@extends('layouts.app')

@section('content')
    <main class="pt-3 px-5">
        <h1 class="text-danger">Lista Tickets</h1>


        <table class="table table-striped">
            <thead>
                <tr>

                    <th scope="col">Titolo</th>
                    <th scope="col">Data Creazione</th>
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
                        <td>{{ $item->created_at }}</td>
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
