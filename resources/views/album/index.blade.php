@extends('base_layout.app')


@section('content')
    <div class="jumbotron text-center">
        <h3>
            @if(\Illuminate\Support\Facades\Auth::check() || \Illuminate\Support\Facades\Auth::guard('worker')->check())
                @if(\Illuminate\Support\Facades\Auth::guard('web')->check())
                    web
                    <h3>Welcome {{\Illuminate\Support\Facades\Auth::guard('web')->user()}}</h3>
                @else
                    admin
                    <h3>Welcome {{\Illuminate\Support\Facades\Auth::guard('worker')->user()}}</h3>
                @endif
            @endif
            @unless(\Illuminate\Support\Facades\Auth::check())
                Welcome Guest .. to continue using our website you need to login

        </h3>


            <div class="text-center">
            <p>Login to continue if you dont have account register</p>
            <a href="{{route('login')}}" class="btn btn-primary">Login</a>
            <a href="{{route('register')}}" class="btn btn-primary">Register</a>
            </div>
        @endunless
    </div>
@endsection