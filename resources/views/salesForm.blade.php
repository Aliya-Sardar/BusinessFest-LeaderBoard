@extends('template.app')

@section('main_content')
<div class="eform-container rounded mx-auto my-5 pt-5">
    <h1 align='center'>Sales Form</h1>
    <div class="form-container mt-5">
        <form action="{{ route('salesUpdate') }}" method="POST">
            @csrf                                               <!--csrf token--> 
            @method('PUT')
            
            <!------------------ Business Name ------------------>
            <h4>Business Name:</h4>
            <div class="d-flex justify-content-center">
                <div class="form-check form-check-inline">
                    <input type="text" class="form-control form-control-lg" id="bName" name="bName" value="{{$bName}}" readonly />
                </div>
            </div>
            <br><br>

            <!------------------ Sales 20% ------------------>
            <h4>Sales:</h4>
            <p>Money</p>
            <div class="d-flex justify-content-center">
                <div class="form-check form-check-inline">
                    <input type="text" class="form-control" id="money" name="money" />
                </div>
            </div>
            <br><br>

            <p>Points</p>
            <div class="d-flex justify-content-center">
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="Sales1" name="Sales" value="1" />
                    <label class="form-check-label" for="Sales1">
                        1
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="Sales2" name="Sales" value="2" />
                    <label class="form-check-label" for="Sales2">
                        2
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="Sales3" name="Sales" value="3" />
                    <label class="form-check-label" for="Sales3">
                        3
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="Sales4" name="Sales" value="4" />
                    <label class="form-check-label" for="Sales4">
                        4
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="Sales5" name="Sales" value="5" />
                    <label class="form-check-label" for="Sales5">
                        5
                    </label>
                </div>
            </div>
            <br><br>
    </div>
@endsection