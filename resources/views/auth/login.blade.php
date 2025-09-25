@section('title', 'Login')

@extends('master')

@section('content')
    <div class="w-100 d-flex justify-content-center">
        <div class="w-25 border p-4 mx-3 form-container shadow-lg bg-body-tertiary rounded">
            <div class="d-flex flex-column justify-content-center align-items-center mb-3">
                <h3 class="mb-0 fs-2">Login</h3>
            </div>
            @if(Session::has('loginError') )
                <div class="alert alert-danger">{{Session::get('loginError')}}</div>
            @endif

            <form action="" method="post">
                @csrf

                <x-form.input label="Email" id="email" type="email" name="email" placeholder="Enter Email Address"/>
                <x-form.input label="Password" id="password" type="password" name="password" placeholder="Enter Password"/>

                <div class="text-center">
                    <button class="btn btn-dark my-2" type="submit">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
