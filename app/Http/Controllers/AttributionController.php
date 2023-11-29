<?php

namespace App\Http\Controllers;

use App\Models\Attribution;
use Illuminate\Http\Request;


class AttributionController extends Controller
{
    public function index(){
        return view("attribution.index");
    }

    public function create(){
        return view("attribution.create");
    }
    public function edit(Attribution $attribution){
        return view("attribution.edit", compact("attribution"));
    }
}
