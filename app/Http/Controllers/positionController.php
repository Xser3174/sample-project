<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Position;

class positionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $positions=Position::all();
        return $positions;
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

        $positions = new Position();
        $positions->position_name = $request->position_name;
        $positions->position_rank = $request->position_rank;
        $positions->save();
    }
    // id	BIGINT(20)	
    // position_name	VARCHAR(255)	
    // position_rank	INT(11)	
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
        $positions=Position::where('id' ,'=' ,$id)->get();
        
        return $positions;
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
        $positions = Position::find($id);

        $positions->position_name = $request->position_name;
        $positions->position_rank = $request->position_rank;

        $positions->save();
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
