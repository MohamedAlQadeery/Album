@extends('base_layout.app')


@section('content')
    <div class="jumbotron text-center">
        <h3>
            @auth
                Welcome {{\Illuminate\Support\Facades\Auth::user()->name}}
            @endauth

            @unless(\Illuminate\Support\Facades\Auth::check())
                Welcome Guest .. to continue using our website you need to login

            @endunless
        </h3>

        @guest
            <div class="text-center">
            <p>Login to continue if you dont have account register</p>
            <a href="{{route('login')}}" class="btn btn-primary">Login</a>
            <a href="{{route('register')}}" class="btn btn-primary">Register</a>
            </div>
        @endguest
    </div>
@endsection