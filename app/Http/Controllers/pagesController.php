<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function home(){
        return view('pages.home');
    }
    public function reg2013(){
    
        return view('pages.reg13');
    }
    public function reg2017(){
        return view('pages.reg17');
    }
    public function gpa(){

    }
    public function cgpa(){

    }
    public function userdetails(){
        return 'okay';
    }

}
 