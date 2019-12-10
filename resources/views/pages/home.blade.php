@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-6">
            <div class="gpaImg">
                <img src="{{asset('images/cgpalogic.jpg') }}" class="img-fluid" alt="cgpa logic">
            </div>
        </div>
        <div class="col-6">
                <div class="well">n is number of all courses successfully cleared during the particular semester in the case of GPA</div>
                <div class="well">GPi is the point corresponding to the grade obtained for each course</div>
                <div class="wel">Ci is the number of Credits assigned to the course</div>
        </div>
    </div>
    

@endsection


