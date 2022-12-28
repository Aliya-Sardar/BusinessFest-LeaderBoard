
@extends('template.app')

@section('main_content')
    <!-- The main content of the index page -->
    <div class="container">
        <h1 align='center'>Welcome to Business Fest 23</h1>
        <br><br>
        <p>Please Login to Evaluate the participants in BFest. After logging in scan the 
            QR Code of each participant to enter their data. There are 2 forms. One is Evaluation form 
            and the other is Sales form. The sales data can only be entered through the sales form.
        </p>
        <br>
        @auth
            <p>You are logged in</p>
        @else
        <a href="{{route('login')}}" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Login</a>
        @endauth
        
    </div>
    
@endsection