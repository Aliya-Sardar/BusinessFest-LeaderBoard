
@extends('template.app')

@section('main_content')
    <!-- Evaluation Form -->
    <!-- HRM = 10% , Marketing = 10% , Finance = 10% , Entrpreneurial Drive = 10 % ,
         Innovation and Sustainibility = 40% , Sales = 20% 
         Total Marks = 100-->

    <div class="eform-container rounded mx-auto my-5 pt-5">
        <h1 align='center'>Evaluation Form</h1>
        <div class="form-container mt-5">
            <form action="{{ route('evaluationUpdate') }}" method="POST">
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

                <!------------------ HRM 10% ------------------>
                <h4>HRM:</h4>
                <div class="d-flex justify-content-center">
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="HRM1" name="HRM" value="1" />
                        <label class="form-check-label" for="HRM1">
                            1
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="HRM2" name="HRM" value="2" />
                        <label class="form-check-label" for="HRM2">
                            2
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="HRM3" name="HRM" value="3" />
                        <label class="form-check-label" for="HRM3">
                            3
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="HRM4" name="HRM" value="4" />
                        <label class="form-check-label" for="HRM4">
                            4
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="HRM5" name="HRM" value="5" />
                        <label class="form-check-label" for="HRM5">
                            5
                        </label>
                    </div>
                </div>
                <br><br>

                <!------------------ Innovation 15% ------------------>
                <h4>Innovation:</h4>
                <div class="d-flex justify-content-center">
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="Inn1" name="Inn" value="1" />
                        <label class="form-check-label" for="Inn1">
                            1
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="Inn2" name="Inn" value="2" />
                        <label class="form-check-label" for="Inn2">
                            2
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="Inn3" name="Inn" value="3" />
                        <label class="form-check-label" for="Inn3">
                            3
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="Inn4" name="Inn" value="4" />
                        <label class="form-check-label" for="Inn4">
                            4
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="Inn5" name="Inn" value="5" />
                        <label class="form-check-label" for="Inn5">
                            5
                        </label>
                    </div>
                </div>
                <br><br>

                <!------------------ Sustainibility 15% ------------------>
                <h4>Sustainibility:</h4>
                <div class="d-flex justify-content-center">
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="Sus1" name="Sus" value="1" />
                        <label class="form-check-label" for="Sus1">
                            1
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="Sus2" name="Sus" value="2" />
                        <label class="form-check-label" for="Sus2">
                            2
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="Sus3" name="Sus" value="3" />
                        <label class="form-check-label" for="Sus3">
                            3
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="Sus4" name="Sus" value="2" />
                        <label class="form-check-label" for="Sus4">
                            4
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="Sus5" name="Sus" value="3" />
                        <label class="form-check-label" for="Sus5">
                            5
                        </label>
                    </div>
                </div>
                <br><br>

                <!------------------ Clean 5% ------------------>
                <h4>Cleanliness and Hygiene:</h4>
                <div class="d-flex justify-content-center">
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="Clean1" name="Clean" value="1" />
                        <label class="form-check-label" for="Clean1">
                            1
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="Clean2" name="Clean" value="2" />
                        <label class="form-check-label" for="Clean2">
                            2
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="Clean3" name="Clean" value="3" />
                        <label class="form-check-label" for="Clean3">
                            3
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="Clean4" name="Clean" value="4" />
                        <label class="form-check-label" for="Clean4">
                            4
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="Clean5" name="Clean" value="5" />
                        <label class="form-check-label" for="Clean5">
                            5
                        </label>
                    </div>
                </div>
                <br><br>

                <!------------------ Proper Documentation 5% ------------------>
                <h4>Proper Documentation:</h4>
                <div class="d-flex justify-content-center">
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="Doc1" name="Doc" value="1" />
                        <label class="form-check-label" for="Doc1">
                            1
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="Doc2" name="Doc" value="2" />
                        <label class="form-check-label" for="Doc2">
                            2
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="Doc3" name="Doc" value="3" />
                        <label class="form-check-label" for="Doc3">
                            3
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="Doc4" name="Doc" value="4" />
                        <label class="form-check-label" for="Doc4">
                            4
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="Doc5" name="Doc" value="5" />
                        <label class="form-check-label" for="Doc5">
                            5
                        </label>
                    </div>
                </div>
                <br><br>


                <!------------------ Stall Decor 5% ------------------>
                <h4>Stall Decor:</h4>
                <div class="d-flex justify-content-center">
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="Decor1" name="Decor" value="1" />
                        <label class="form-check-label" for="Decor1">
                            1
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="Decor2" name="Decor" value="2" />
                        <label class="form-check-label" for="Decor2">
                            2
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="Decor3" name="Decor" value="3" />
                        <label class="form-check-label" for="Decor3">
                            3
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="Decor4" name="Decor" value="4" />
                        <label class="form-check-label" for="Decor4">
                            4
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="Decor5" name="Decor" value="5" />
                        <label class="form-check-label" for="Decor5">
                            5
                        </label>
                    </div>
                </div>
                <br><br>

                <!------------------ Marketing 20% ------------------>
                <h4>Marketing:</h4>
                <!------------------ Sponsorship 5% ------------------>
                <p>Sponsorship</p>
                <div class="d-flex justify-content-center">
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="Spon1" name="Spon" value="1" />
                        <label class="form-check-label" for="Spon1">
                            1
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="Spon2" name="Spon" value="2" />
                        <label class="form-check-label" for="Spon2">
                            2
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="Spon3" name="Spon" value="3" />
                        <label class="form-check-label" for="Spon3">
                            3
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="Spon4" name="Spon" value="4" />
                        <label class="form-check-label" for="Spon4">
                            4
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="Spon5" name="Spon" value="5" />
                        <label class="form-check-label" for="Spon5">
                            5
                        </label>
                    </div>
                </div>
                <br>
                <!------------------ Social Media 5% ------------------>
                <p>Social Media</p>
                <div class="d-flex justify-content-center">
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="SM1" name="SM" value="1" />
                        <label class="form-check-label" for="SM1">
                            1
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="SM2" name="SM" value="2" />
                        <label class="form-check-label" for="SM2">
                            2
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="SM3" name="SM" value="3" />
                        <label class="form-check-label" for="SM3">
                            3
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="SM4" name="SM" value="4" />
                        <label class="form-check-label" for="SM4">
                            4
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="SM5" name="SM" value="5" />
                        <label class="form-check-label" for="SM5">
                            5
                        </label>
                    </div>
                </div>
                <br>
                <!------------------ Digital Ads 5% ------------------>
                <p>Digital Ads</p>
                <div class="d-flex justify-content-center">
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="DA1" name="DA" value="1" />
                        <label class="form-check-label" for="DA1">
                            1
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="DA2" name="DA" value="2" />
                        <label class="form-check-label" for="DA2">
                            2
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="DA3" name="DA" value="3" />
                        <label class="form-check-label" for="DA3">
                            3
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="DA4" name="DA" value="4" />
                        <label class="form-check-label" for="DA4">
                            4
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="DA5" name="DA" value="5" />
                        <label class="form-check-label" for="DA5">
                            5
                        </label>
                    </div>
                </div>
                <br>
                <!------------------ Promotional Activities 5% ------------------>
                <p>Promotional Activities</p>
                <div class="d-flex justify-content-center">
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="PA1" name="PA" value="1" />
                        <label class="form-check-label" for="PA1">
                            1
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="PA2" name="PA" value="2" />
                        <label class="form-check-label" for="PA2">
                            2
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="PA3" name="PA" value="3" />
                        <label class="form-check-label" for="PA3">
                            3
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="PA4" name="PA" value="4" />
                        <label class="form-check-label" for="PA4">
                            4
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="PA5" name="PA" value="5" />
                        <label class="form-check-label" for="PA5">
                            5
                        </label>
                    </div>
                </div>
                <br><br>
    
                <!------------------ Submit Button ------------------>
                <div class="d-flex">
                    <button type="submit" class="btn btn-primary ml-auto">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <br><br>
@endsection