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

            
            
        
        </div>
        <div class="col-6">
            {!! Form::open([ 'action' => 'CalcController@calcCGpa', 'method' => 'POST']) !!}
            @foreach($value as $val)
            <h5>{{$val->Subjecttitle}} - {{$val->Subjectcode}}</h5>
            <div class="row">
            <div class="col-md-4">
                Credits: {{$val->credits}}
            </div>
            <div class="col-md-8">
                    <div class = "form-group">
                        {{Form::select('grade[]', ['10' => 'S', '9' => 'A', '8' => 'B', '7' => 'C', '6' => 'D', '5' => 'E', '0' => 'U'], null, ['id'=>'grade', 'placeholder' => 'select your grade'])}} 
                
                    </div> <br>
            </div>
            <script>
                
                </script>

            </div>
            @endforeach
            
            <div class = "form-group">
                {!!Form::submit('Calculate', array('class'=>'btn btn-primary'))!!}
            </div>
        </div>
    </div>

@endsection