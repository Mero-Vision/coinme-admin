<?php

namespace App\Http\Controllers;

use App\Models\MarginPercent;
use Illuminate\Http\Request;

class MarginPercentController extends Controller
{
    public function index(){
        $marginPercent = MarginPercent::latest()->get();
        return view('admin.margin_percent.margin_percent',compact('marginPercent'));
    }

    
}