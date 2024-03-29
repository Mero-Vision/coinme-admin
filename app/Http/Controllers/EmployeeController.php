<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function viewEmployees($settingable_type = null, $settingable_id = null){

        $site_setting = SiteSetting::where("settingable_type", $settingable_type)
            ->where("settingable_id", $settingable_id)
            ->get();
        $data = [];
        foreach ($site_setting as $item) {
            if ($item->type == 'image') {
                $data[$item->key] = $item->getFirstMediaUrl();
            } else {
                $data[$item->key] = $item->value;
            }
        }

        return view('admin.employees.view_employees',compact('data'));
    }

    public function createEmployees($settingable_type = null, $settingable_id = null){
        $site_setting = SiteSetting::where("settingable_type", $settingable_type)
            ->where("settingable_id", $settingable_id)
            ->get();
        $data = [];
        foreach ($site_setting as $item) {
            if ($item->type == 'image') {
                $data[$item->key] = $item->getFirstMediaUrl();
            } else {
                $data[$item->key] = $item->value;
            }
        }
        
        return view('admin.employees.add_employees', compact('data'));
    }

    public function employeeDashboard($settingable_type = null, $settingable_id = null){
        $site_setting = SiteSetting::where("settingable_type", $settingable_type)
            ->where("settingable_id", $settingable_id)
            ->get();
        $data = [];
        foreach ($site_setting as $item) {
            if ($item->type == 'image') {
                $data[$item->key] = $item->getFirstMediaUrl();
            } else {
                $data[$item->key] = $item->value;
            }
        }

        $employees=Employee::count();
        
        return view('admin.employees.employee_dashboard', compact('data', 'employees'));
    }

    public function employeesData()
    {
        $employees = Employee::latest()
           ->get();
        return response()->json(['data' => $employees]);
    }

    public function store(Request $request){

        $request->validate([
            'name'=>['required'],
            'password'=>['required'],
            'mobile_no'=>['nullable','numeric']
            
        ]);

        try{
            $employee=DB::transaction(function()use($request){

                $employee=Employee::create([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'mobile_no'=>$request->mobile_no,
                    'password'=>$request->password
                    
                ]);
                return $employee;
                
            });
            if($employee){
                return back()->with('success','Employee created successfully!');
            }
            
        }
        catch(\Exception $e){
            return back()->with('error',$e->getMessage());
            
        }

        
    }

    public function destroy($id)
    {
        $employee = Employee::find($id);

        if ($employee) {
            $employee->delete();
            return response()->json(['status' => 'success', 'message' => 'Employee deleted successfully.']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Employee Not Found!']);
        }
    }
}