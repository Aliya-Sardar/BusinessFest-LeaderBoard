@extends('template.app')

@section('main_content')
    <div class="container">
        <h1>{{$bName}}</h1>
        <br><br>
        <div class="form-container mt-5">
            <a href="/EvaluationForm/{{ $bName }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Evaluation Form</a>
            @if (Auth::user()->name == "BFest Team 1")
                <a href="/SalesForm/{{ $bName  }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Sales Form</a>
            @endif
        </div>
    </div>
@endsection