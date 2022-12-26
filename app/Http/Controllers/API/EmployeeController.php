<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function storeemp(Request $request){
        $emp = Employee::create($request->all());

        return response()->json([
            'success'=>true,
            'message'=>$emp
        ]);

    }

    public function allEmp(){
        $emps = Employee::all();

        return response()->json([
            'success'=>true,
            'message'=>$emps
        ]);

    }
}
