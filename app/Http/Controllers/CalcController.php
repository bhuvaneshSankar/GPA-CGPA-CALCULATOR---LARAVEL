<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\subjects;
Use Session;
Use DB;
class CalcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
  //  public $details = 'hello';

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return 123;
    }
    
    public function detailsOfUser($det){
      //  echo "$det";
    //    $this->details = $det;
    //    echo "$this->details";
    }
    public function compute(Request $request){

        $this->validate($request, [
            'name'=>'required',
            'semester'=>'required',
            'department'=>'required',
            'regno'=>'required',
            'gpaorcgpa'=>'required'
        ]);



        $var = $request->gpaorcgpa;
        $request->session()->put('name', $request->name);
        $request->session()->put('semester', $request->semester);
        $request->session()->put('department', $request->department);
        $request->session()->put('regno', $request->regno);
        
        if($var==0){
            $val = subjects::where('Semester', $request->semester)->get();
         //   $this->detailsOfUser($val);
        //    $request->session()->set('department',$request->department  ,'semester',$request->semester );
        //    $sess = session('department', $request->department);
            $request->session()->put('name', $request->name);
            $request->session()->put('semester', $request->semester);
            $request->session()->put('department', $request->department);
        //    Session::push('name', $request->name);
        //    Session::push('regno', $request->regno);
        //    Session::push('department', $request->department);
        //    Session::push('year', $request->year);
        //    Session::push('semester', $request->semester);
        //    return $sess;
            return view('pages.gpa')->with('value', $val)->with('details', $request);
    
        }
        else if($var==1){
            $val = subjects::where('Semester', '<=', $request->semester)->get();
            return view('pages.cgpa')->with('value', $val)->with('details', $request);
        }   
    
    }
    public function computeCopy(Request $request){

        $this->validate($request, [
            'name'=>'required',
            'regno'=>'required',
            'semester'=>'required',
            'department'=>'required',
            'gpaorcgpa'=>'required'
        ]);
        $var = $request->gpaorcgpa;
    //    return $request->department;
    //    $val = subjects::where(['Semester',  $request->semester],[ 'Department', $request->department])->get();
    //    $val = subjects::where(['Department', $request->department], ['Semester', $request->semester])->get();
    //    $val = DB::select('select * from subjects where Department = :id1, Semester = :id2', ['id1'=>$request->department, 'id2'=>$request->semeseter]);
        if($var==0){
            $val = DB::select('select * from subjects where Semester = :id1 and  Department = :id2', ['id1'=>$request->semester, 'id2'=>$request->department]);
            $request->session()->put('name', $request->name);
            $request->session()->put('regno', $request->regno);
            $request->session()->put('year', $request->year);
            $request->session()->put('semester', $request->semester);
            $request->session()->put('department', $request->department);
            return view('pages.gpa')->with('value', $val)->with('details', $request);
        }
        else if($var==1){
            $val = DB::select('select * from subjects where Semester <= :id1 and Department = :id2', ['id1'=>$request->semester, 'id2'=>$request->department]);
            return view('pages.cgpa')->with('value', $val)->with('details', $request);
        }
    }
    public function calcGpa(Request $request){
     //     $credits = subjects::where('Semester', $request->semester)->where('Department')
    //    $value = Session::get('userDetails');
    //    $val = subjects::where('Semester', 'Department' , $request->semester, $request->department)->get();
        $val = DB::select('select * from subjects where Semester = :id1 and  Department = :id2', ['id1'=>$request->semester, 'id2'=>$request->department]);
    //    $subjectCredits = subjects::where('Semester', 'Department', Session::get('semester'), Session::get('department'))->pluck('credits');
     //   $subjectCredits = DB::select('select credits from subjects where Semester=:id1 and Department = :id2', ['id1'=>Session::get('semester'), 'id2'=>Session::get('department')]);
        $subjectCredits = subjects::where('Semester', Session::get('semester'))->where('Department', Session::get('department'))->pluck('credits');
     //   return $subjectCredits;
        $totalsubjectCredits = 0;
    /*    echo $subjectCredits[0];   valid informations
       // return sizeof($request["grade"]);
        for($i=0; $i<sizeof($request["grade"]); $i++){
            echo $request["grade"][$i];
        }
        return $request["grade"][3];   */
        $earnedCredits = 0;
/*        for($i=0; $i<sizeof($subjectCredits); $i++){
            $earnedCredits += $subjectCredits * 5;
        //    echo $subjectCredits[$i]; 
        //    echo $request["grade"][$i];
        }    */
        
        foreach($subjectCredits as $row){
        //    echo $row;
            $totalsubjectCredits += $row;
        } 
    
        for($i=0; $i<sizeof($subjectCredits); $i++){
            $earnedCredits += $subjectCredits[$i] * $request["grade"][$i];
        }
    //    echo $earnedCredits.'\n';
    //    echo $totalsubjectCredits.'\n';
        
        $gpa = $earnedCredits/$totalsubjectCredits;
     //   $sess = Session::all();
       // print_r($sess);
     //  $data = $request->session()->all();
     //  print_r($data);
     //   return view('pages.result')->with('scoredCredits', $request)->with('value', $val)->with('userDetails', Session::get('name'))->with('gpa', $gpa);
     //   return view('pages.gpa')->with('gpa', $gpa);
     //   return view('pages.gpa')->with('value', $val)->with('details', $request);
     //   return redirect(view('pages.gpa'));
        return view('pages.result')->with('result', $gpa)->with('requested', 'GPA')->with('name', Session::get('name'))->with('regno', Session::get('regno'))
        ->with('semester', Session::get('semester'))->with('department', Session::get('department'));

    }

    public function calcCGpa(Request $request){
    //    $subjectCredits = subjects::where('Semester', '<=', $request->semester)->pluck('credits');
    //    $subjectCredits = DB::select('select credits from subjects where Semester <= :id', ['id' => Session::get('semester')]);
        //  $subjectCredits = DB::select('select credits from subjects where Semester <= :id1 and Department = :id2', ['id' => $request->semester, 'id2'=>$request->department]);
          $subjectCredits = subjects::where('Semester', Session::get('semester'))->where('Department', Session::get('department'))->pluck('credits');
          //  return $subjectCredits;
        $totalsubjectCredits = 0;
        $earnedCredits = 0;
        foreach($subjectCredits as $row){
            $totalsubjectCredits += $row;
        }  
        for($i=0; $i<sizeof($subjectCredits); $i++){
            $earnedCredits += $subjectCredits[$i] * $request["grade"][$i];
        }
        $cgpa = $earnedCredits/$totalsubjectCredits;
        return view('pages.result')->with('result', $cgpa)->with('requested', 'CGPA')->with('name', Session::get('name'))->with('regno', Session::get('regno'))
        ->with('semester', Session::get('semester'))->with('department', Session::get('department'));

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
