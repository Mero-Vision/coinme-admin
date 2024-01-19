<?php

namespace App\Http\Controllers;

use App\Models\MarginPercent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class MarginPercentController extends Controller
{
    public function index(){
        $marginPercent = MarginPercent::latest()->get();
        return view('admin.margin_percent.margin_percent',compact('marginPercent'));
    }

    public function store(Request $request){
        $request->validate([
            'margin_percent'=>['required','numeric','max:50',Rule::unique('margin_percents','margin_percent')]
            
        ]);
        try{
            $percent=DB::transaction(function()use($request){
                $percent=MarginPercent::create([
                    'user_id'=>auth()->user()->id,
                    'margin_percent'=>$request->margin_percent,
                    
                ]);
                return $percent;
                
            });
            if($percent){
                return back()->with('success','Margin Percent created successfully!');
            }
            
        }
        catch(\Exception $e){
            return back()->with('error',$e->getMessage());
            
        }
    }

    
}