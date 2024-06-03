@extends('layouts.access')
@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3 d-flex align-items-center justify-content-between">
        <div class="w-50 py-5">
            <h1 class="mb-4">Assistenza Rapida e Efficiente</h1>
            <p class="fs-4 w-50">Accedi al nostro portale di supporto per risolvere i tuoi problemi con facilità e velocità.
                Siamo qui per
                aiutarti!</p>
        </div>
        <div class="w-25">
            <div class="">
                <h1 class="mb-4 text-center">Accedi ora!</h1>
                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">

                    @guest
                        <li class="nav-item">
                            <a class="btn btn-outline-dark me-4" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="btn btn-outline-dark" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('dashboard') }}">{{ __('Dashboard') }}</a>
                                <a class="dropdown-item" href="{{ url('profile') }}">{{ __('Profile') }}</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
@endsection
