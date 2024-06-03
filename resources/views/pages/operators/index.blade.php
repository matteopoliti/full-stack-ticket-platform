@extends('layouts.app')

@section('content')
    <main class="pt-3 px-5 bg-secondary-subtle vh-100">
        <h1>Operatori disponibili</h1>

        <div class="row my-5">

            @foreach ($operators as $item)
                <div class="col-lg-4 col-md-6 mb-4">
                    <a href="#" class="card align-items-center text-decoration-none border-0 hover-lift-light py-4">

                        <h4 class="text-dark text-center mt-3">
                            {{ $item->name }}
                        </h4>

                        <h6>Codice operatore: #{{ $item->id }}</h6>

                    </a>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center">
            {{ $operators->links() }}
        </div>
    </main>
@endsection
