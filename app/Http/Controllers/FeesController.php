<?php

namespace App\Http\Controllers;

use App\Models\SchoolFees;
use Illuminate\Http\Request;

class FeesController extends Controller
{
    public function index(){
        return view('fees.list');
      }


       public function create(){
        return view('fees.create');
       }
       public function edit(SchoolFees $fee){
        return view('fees.edit',compact('fee'));
       }
}
