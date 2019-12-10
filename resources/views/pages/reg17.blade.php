@extends('layouts.app')
 
@section('content')

    <h2>Regulation 2017</h2>
    <div class="row">
     <div class="col-6">
      <table class = "table table-hover">
        <thead>
            <tr>
                <th scope="col">Grade</th>
                <th scope="col">Grade Points</th>
                <th scope="col">Mark Range</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">O</th>
                <td>10</td>
                <td>91-100</td>
            </tr> 
            <tr>
                <th scope="row">A+</th>
                <td>9</td>
                <td>81-90</td>
            </tr>
            <tr>
                <th scope="row">A</th>
                <td>8</td>
                <td>71-80</td>
            </tr> 
            <tr>
                <th scope="row">B+</th>
                <td>7</td>
                <td>61-70</td>
            </tr>
            <tr>
                <th scope="row">B</th>
                <td>6</td>
                <td>50-60</td>
            </tr>
            <tr>
                <th scope="row">RA</th>
                <td>0</td>
                <td>less than 50</td>
            </tr>
            <tr>
                <th scope="row">SA</th>
                <td>0</td>
                <td>-</td>
            </tr>
            <tr>
                <th scope="row">W</th>
                <td>0</td>
                <td>-</td>
            </tr>
        </tbody>
      </table>
     </div>
     <div class="col-6">
            {!! Form::open(['method'=>'POST']) !!}
                <div class = "form-group">
                    {{Form::text('name','',['class'=>'form-control', 'placeholder'=>'Name'])}}  <br>
                </div>
                <div class = "form-group">
                    {{Form::text('regno','',['class'=>'form-control', 'placeholder'=>'Reg no'])}} <br>
                </div>
                <div class = "form-group">
                        {{Form::select('semester', ['0' => 'Semester 1', '1' => 'Semester 2', '2' => 'Semester 3', '3' => 'Semester 4', '4' => 'Semester 5',
                         '5' => 'Semester 6', '6' => 'Semester 7', '7' => 'Semester 8'], null, ['placeholder' => 'Select your semester...'])}}
                </div>  <br>
               
                <div class = "form-group">
                    {{Form::select('department', ['0' => 'B.E. Aeronautical Engineering', '1' => 'B.E. Automobile Engineering', '2' => 'B.E. Civil Engineering', 
                    '3' => 'B.E. Computer Science and Engineering', '4' => 'B.E. Electrical and Electronics Engineering',
                    '5' => 'B.E. Electronics and Communication Engineering', '6' => 'B.E. Electronics and Instrumentation Engineering', '7' => 'B.E. Instrumentation and Control Engineering', 
                    '8' => 'B.E. Mechanical Engineering', '9' => 'B.E. Biomedical Engineering', '10' => 'B.Tech. Information Technology'],
                     null, ['placeholder' => 'Select your department...'])}}
                </div>  <br>

                <div class = "form-group">
                    {{Form::select('gpa/cgpa', ['0' => 'GPA', '1' => 'CGPA'], '0')}} 
                </div> <br>

                <div class = "form-group">
                    {{Form::submit('Done')}}
                </div>
                

           {!! Form::close() !!}
        

     </div>
    </div>


    
@endsection