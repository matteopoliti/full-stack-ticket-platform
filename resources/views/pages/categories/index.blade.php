@extends('layouts.app')

@section('content')
    <main class="pt-3 px-5 bg-secondary-subtle">
        <h1>Categorie disponibili</h1>

        <div class="row mt-5">

            @foreach ($categories as $item)
                <div class="col-lg-4 col-md-6 mb-4">
                    <a href="#" class="card align-items-center text-decoration-none border-0 hover-lift-light py-4">
                        <span class="icon-circle icon-circle-lg bg-pastel-primary text-primary">
                            <i class="{{ $item->icon }}"></i>
                        </span>
                        <h4 class="text-dark text-center mt-3">
                            {{ $item->name }}
                        </h4>

                        <p class="text-dark text-center mt-3">{{ $item->description }}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </main>
@endsection
