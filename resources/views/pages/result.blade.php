@extends('layouts.app');
@section('content')
<div>
    
        <div class="well">
            <h4>Name</h4> 
            {{$name}}
        </div> <br>
        <div class="well">
            <h4>Register Number</h4>
            {{$regno}}
        </div> <br>
        <div class="well">
            <h4>Department</h4>
            {{$department}}
        </div> <br>
       
        <div class="well">
            <h4>Semester</h4>
            {{$semester}}
        </div> <br>
        <div class="well">
            <h1>YOUR {{$requested}} IS {{$result}}</h1>
       
        </div>
</div>
@endsection