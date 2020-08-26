<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Department;

class departmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $departments=Department::get();
        // return $dapartments;

        $departments=Department::all();
        return $departments;
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
        $departments = new Department();
        $departments->department_name = $request->department_name;
        $departments->save();
        
            
        // return redirect('/departments');
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
        
        // $employees=Employee::select($id)->get();
        $departments=Department::where('id' ,'=' ,$id)->get();
        
        return $departments;
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
        $departments = Department::find($id);

        $departments->department_name = $request->department_name;

        $departments->save();
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
        // $departments = Department::where('id', $id)->delete();
        $departments=Department::where('id', $id)->FirstOrFail();
        $departments->delet();
        return true;
    }

    public function forceDelete($id)
    {
        //

       
    }
    public function softdelete($id)
    {
        //
        // echo "destroy";
        #Delete data
        // $category=DB::table('categories')->where('id',$id)->delete();


        #Recycle -->id => delete =>date insert at 'deleted_at'

        dd($id);
        $category=DB::table('departments')
                    ->where('id',$id)
                    ->update(['deleted_at'=>Carbon::now()]);

        return $category;
    }
}
