@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-6">
            <div class="well">
                <h4>Name</h4> 
                {{$details->name}}
            </div> <br>
            <div class="well">
                <h4>Register Number</h4>
                {{$details->regno}}
            </div> <br>
            <div class="well">
                <h4>Department</h4>
                {{$details->department}}
            </div> <br>
            <div class="well">
                <h4>Semester</h4>
                {{$details->semester}}
            </div> <br>

            <div id = "displaygpa">
                <h2>Your GPA  is </h2>
            </div> 
            <style>
                #displaygpa{
                    display: none;
                }
            </style>
            
        
        </div>
        <div class="col-6">
            {!! Form::open([ 'action' => 'CalcController@calcGpa', 'method' => 'POST']) !!}
            @foreach($value as $val)
            <h5>{{$val->Subjecttitle}} - {{$val->Subjectcode}}</h5>
            <div class="row">
            <div class="col-md-4">
                Crerdits: {{$val->credits}}
            </div>
        
            <div class="col-md-8">
                <form>
                        <select id="nam" name="" form="">
                                <option value="s">S</option>
                                <option value="a">A</option>
                                <option value="b">B</option>
                                <option value="c">C</option>
                                <option value="d">D</option>
                                <option value="e">E</option>
                                <option value="u">U</option>
                        </select>
                    <button id="gradebtn" onclick="compu()">click</button>

                </form>
            </div>
                <script>
                    var arr=[];
                    function compu(){
                        var x = document.getElementById('nam').value;
                        arr.push(x);
                        for(var i=0; i<arr.length; i++)
                            console.log(arr[i]);
                        
                    }
                </script>
             <br>
                  
            </div> 
            @endforeach
            <div class = "form-group">
                {{Form::submit('Calculate', ['class' => 'btn btn-primary'])}}
            </div>
        </div>
    </div>

@endsection