<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class EmploymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // protected $connection = "msqldb";
    public function index()
    {
        // $emp = DB::select("select * from Employment");
        // echo "Hello";
        $serverName = "VIETNHAN"; //serverName\instanceName
        $connectionInfo = array( "Database"=>"HR");
        $conn = sqlsrv_connect( $serverName, $connectionInfo);

        if( $conn ) {
            $personal = sqlsrv_query($conn, "SELECT * from Personal");
            $p = array();
            while( $obj = sqlsrv_fetch_object( $personal )) {
                array_push($p, $obj);
            }
        }else{
            echo "Connection could not be established.<br />";
            die( print_r( sqlsrv_errors(), true));
        }

        $asc= json_decode(json_encode($p), true);
        // print_r($asc[0]);
        // print_r(array_keys($asc[0]));
        return view('hr', ['person' => $asc, 'title' => array_keys($asc[0])]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
