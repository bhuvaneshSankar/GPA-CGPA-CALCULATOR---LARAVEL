@extends('layouts.app')

@section('content')

    <h2>Regulation 2013</h2>
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
                <th scope="row">S</th>
                <td>10</td>
                <td>91-100</td>
            </tr> 
            <tr>
                <th scope="row">A</th>
                <td>9</td>
                <td>81-90</td>
            </tr>
            <tr>
                <th scope="row">B</th>
                <td>8</td>
                <td>71-80</td>
            </tr> 
            <tr>
                <th scope="row">C</th>
                <td>7</td>
                <td>61-70</td>
            </tr>
            <tr>
                <th scope="row">D</th>
                <td>6</td>
                <td>57-60</td>
            </tr>
            <tr>
                <th scope="row">E</th>
                <td>5</td>
                <td>50-56</td>
            </tr>
            <tr>
                <th scope="row">U</th>
                <td>0</td>
                <td>Less than 50 (or >= 50 but not satisfying clause 13.1)</td>
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
            {!! Form::open(['action'=> 'CalcController@computeCopy', 'method'=>'POST']) !!}
                <div class = "form-group">
                    {{Form::text('name','',['class'=>'form-control', 'placeholder'=>'Name'])}}  <br>
                </div>
                <div class = "form-group">
                    {{Form::text('regno','',['class'=>'form-control', 'placeholder'=>'Reg no'])}} <br>
                </div>
                <div class = "form-group">
                        {{Form::select('semester', ['1' => 'Semester 1', '2' => 'Semester 2', '3' => 'Semester 3', '4' => 'Semester 4', '5' => 'Semester 5',
                         '6' => 'Semester 6', '7' => 'Semester 7', '8' => 'Semester 8'], null, ['placeholder' => 'Select your semester...'])}}
                </div>   <br>
               
                <div class = "form-group">
                    {{Form::select('department', ['B.E. Aeronautical Engineering' => 'B.E. Aeronautical Engineering', 'B.E. Automobile Engineering' => 'B.E. Automobile Engineering',
                     'B.E. Civil Engineering' => 'B.E. Civil Engineering', 
                    'B.E. Computer Science and Engineering' => 'B.E. Computer Science and Engineering', 'B.E. Electrical and Electronics Engineering' => 'B.E. Electrical and Electronics Engineering',
                    'B.E. Electronics and Communication Engineering' => 'B.E. Electronics and Communication Engineering', 'B.E. Electronics and Instrumentation Engineering' => 'B.E. Electronics and Instrumentation Engineering', 'B.E. Instrumentation and Control Engineering' => 'B.E. Instrumentation and Control Engineering', 
                    'B.E. Mechanical Engineering' => 'B.E. Mechanical Engineering', 'B.E. Biomedical Engineering' => 'B.E. Biomedical Engineering', 'B.Tech. Information Technology' => 'B.Tech. Information Technology'],
                     null, ['placeholder' => 'Select your department...'])}}
                </div> <br>

                <div class = "form-group">
                    {{Form::select('gpaorcgpa', ['0' => 'GPA', '1' => 'CGPA'], '0')}}
                </div> <br>

                <div class = "form-group">
                    {{Form::submit('Done', ['class' => 'btn btn-primary'])}}
                </div>
                

           {!! Form::close() !!}
        

     </div>
    </div>


    
@endsection