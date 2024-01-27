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

    public function edit($id){

        $marginPercent=MarginPercent::find($id);
        if(!$marginPercent){
            return back()->with('error','Margin Percent Not Found');
        }

        return view('admin.margin_percent.edit_percent',compact('marginPercent'));

        

        
        
    }

    public function update(Request $request)
    {   $request->validate([
            'margin_percent'=>['required','numeric','max:50']
        
    ]);

        $marginPercent = MarginPercent::find($request->margin_id);
        if (!$marginPercent) {
            return back()->with('error', 'Margin Percent Not Found');
        }

        try{
            $marginPercent=DB::transaction(function()use($request,$marginPercent){
                $marginPercent->update([
                    'margin_percent'=>$request->margin_percent
                    
                ]);
                return $marginPercent;
                
            });
            if($marginPercent){
                return back()->with('success','Margin Percent Updated Successfully!');
            }
            
        }
        catch(\Exception $e){
            return back()->with('error',$e->getMessage());
            
        }

        return view('admin.margin_percent.edit_percent', compact('marginPercent'));
    }

    
}