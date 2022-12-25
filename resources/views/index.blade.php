
@extends('template.app')

@section('main_content')
    <!-- Sign in Form -->
    <div class="signin-container rounded mx-auto my-5 py-5">
        <h1 align='center'>Log in</h1>
        <div class="form-container mt-5">
            <form action="{{ route('loginAuth') }}" method="POST">
                @csrf                                               <!--csrf token--> 
                <!-- Email -->
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email" />
                </div>
    
                <!-- Password -->
                <div class="form-group mt-4">
                    <input type="password" class="form-control" name="password" placeholder="Password"/>
                </div>
    
                <!-- Sign in Button -->
                <br/>
                <div class="d-flex">
                    <button type="submit" class="btn btn-primary ml-auto">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection