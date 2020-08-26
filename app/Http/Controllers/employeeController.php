<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Employee;
use App\emp_dep_position;
class employeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employees=Employee::all();
        return $employees;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        try{
            $employees = new Employee();
            $employees->employee_name = $request->employee_name;
            $employees->email = $request->email;
            $employees->dob = $request->dob;
            $employees->password = Hash::make($request->password);
            $employees->gender = $request->gender;
            $employees->save();

            $lastemp_id = Employee::max('id');
            if($request->position_id){
                $req=$request->position_id;

            }else{
                $req=1;
            }
            if($request->department_id){
                $req=$request->department_id;

            }else{
                $req=1;   
            }
            if($request->employee_id){
                $req=$request->employee_id;
            }else{
                $req=1;  
            }
            
            $emp_dep_position =new emp_dep_position();
            $emp_dep_position->employee_id =$lastemp_id;
            $emp_dep_position->department_id =$req;
            $emp_dep_position->position_id =$req;
            $emp_dep_position->save();

            return response()->json([
                'message' =>'Successful'],200);
            
        }catch(QueryException $e){
            return response()->json([
                'message' =>$e->getMessage()
            ]);
        }
        

 // id	BIGINT(20)	
// employee_id	BIGINT(20)	
// department_id	BIGINT(20)	
// position_id	BIGINT(20)	
// deleted_at	TIMESTAMP	NULL
// created_at	TIMESTAMP	CURRENT_TIMESTAMP()
// updated_at	TIMESTAMP	CURRENT_TIMESTAMP()       

    }

    // id	BIGINT(20)	
    // employee_name	VARCHAR(255)	
    // email	VARCHAR(255)	NULL
    // dob	DATE	NULL
    // password	VARCHAR(255)	
    // gender	INT(11)	1
    // deleted_at	TIMESTAMP	NULL
    // created_at	TIMESTAMP	CURRENT_TIMESTAMP()
    // updated_at	TIMESTAMP	CURRENT_TIMESTAMP()
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $employees=Employee::where('id' ,'=' ,$id)->get();
        
        return $employees;
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
        // dd($request);
        try{

                $employees = Employee::find($id);

                $employees->employee_name = $request->employee_name;
                $employees->email = $request->email;
                $employees->dob = $request->dob;
                $employees->password = $request->password;
                $employees->gender = $request->gender;
                $employees->save();

                // $lastemp_id = Employee::max('id');
                $emp=emp_dep_position::where('employee_id',$id)->first();
                if($emp){

                if($request->position_id){
                    $req=$request->position_id;

                }else{
                    $req=1;
                }

                if($request->department_id){
                    $req=$request->department_id;

                }else{
                    $req=1;   
                }

                           
                $emp->department_id =$req;
                $emp->position_id =$req;
                $emp->update();
            }

                return response()->json([
                    'message' =>'Successful'],200);
                
                    }catch(QueryException $e){
                return response()->json([
                    'message' =>$e->getMessage()
                ]);
            }
        
        
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
