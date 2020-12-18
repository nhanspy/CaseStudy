<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeModel;
use Illuminate\Support\Facades\DB;

class intergrateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    public function index()
    {
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

        $hr= json_decode(json_encode($p), true);

        $p = EmployeeModel::all();
        $payroll = json_decode(json_encode($p), true);
        // $integrate = array_intersect_key($hr,$payroll);
        // $integrate = array_merge($hr,$payroll);
        $integrate = $hr;
        $hr_f = [];
        $payroll_f = [];
        for ($i = 0 ; $i < sizeof($integrate) ; $i ++){
            $dem_payroll = 0;
            foreach($payroll as $p){
                if ($p['idEmployee'] == $integrate[$i]['Employee_ID']){
                    echo '1';
                    $integrate[$i]['SSN'] = $p['SSN'];
                    $integrate[$i]['Pay_Rate'] = $p['Pay_Rate'];
                    $integrate[$i]['PayRates_id'] = $p['PayRates_id'];
                    $integrate[$i]['Vacation_Days'] = $p['Vacation_Days'];
                    $integrate[$i]['Paid_To_Date'] = $p['Paid_To_Date'];
                    $integrate[$i]['Paid_Last_Year'] = $p['Paid_Last_Year'];
                    $integrate[$i]['Employee_Number'] = $p['Employee_Number'];
                } 
                else {
                    if ($dem_payroll == 0) {
                        array_push($hr_f, $hr[$i]);
                        $dem_payroll += 1;
                    }
                    array_push($payroll_f, $p);
                }
            }
        }
        
        
        // foreach ($integrate as $i){
        //     echo $i;
        //     echo "<br>";
        // }
        // print_r($integrate);
        return view('integrate', 
          [
              'integrate' => $integrate, 
              'title' => array_keys($integrate[0]), 
              'hr' => $hr_f ,
              'titleHR' => array_keys($hr_f[0]), 
              'payroll' => $payroll_f, 
              'titlePR' => array_keys($payroll_f[0])
          ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $integrate = [];
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // print_r($request);
        $payroll = new EmployeeModel();
        $payroll->Employee_Number = $request->Employee_Number;
        $payroll->idEmployee = $request->Employee_ID;
        $payroll->First_Name = $request->First_Name;
        $payroll->Last_Name = $request->Last_Name;
        $payroll->SSN = $request->SSN;
        $payroll->Pay_Rate = $request->Pay_Rate;
        $payroll->PayRates_id = $request->PayRates_id;
        $payroll->Vacation_Days = $request->Vacation_Days;
        $payroll->Paid_To_Date = $request->Paid_To_Date;
        $payroll->Paid_Last_Year = $request->Paid_Last_Year;
        $sql = "insert into employee values(" . $payroll->Employee_Number.',' . $payroll->idEmployee . ',"' . $payroll->First_Name .'","'. $payroll->Last_Name .'",'. $payroll->SSN  .','. $payroll->Pay_Rate  .','. $payroll->PayRates_id  .','. $payroll->Vacation_Days  .','.$payroll->Paid_To_Date  .','. $payroll->Paid_Last_Year . ');';
        echo $sql;
        $re = DB::insert($sql);
        // print_r($re);

        $serverName = "VIETNHAN"; //serverName\instanceName
        $connectionInfo = array( "Database"=>"HR");
        
        $conn = sqlsrv_connect( $serverName, $connectionInfo);
        if( $conn ) {
            $sql = 'insert into Personal values(' . $request->Employee_ID . ",'" . $request->First_Name ."','". $request->Last_Name ."','". $request->Middle_Initial  ."','".$request->Address1  ."','". $request->Address2  ."','". $request->City  ."','". $request->State  ."',". $request->Zip .",'". $request->Email ."','". $request->Phone_Number ."','". $request->Social_Security_Number ."','". $request->Drivers_License."','". $request->Marital_Status."',". $request->Gender."," . $request->Shareholder_Status.",". $request->Benefit_Plans.",'". $request->Ethnicity . "');";
            echo $sql;
            $personal = sqlsrv_query($conn, $sql);
            // $p = array();
            // while( $obj = sqlsrv_fetch_object( $personal )) {
            //     array_push($p, $obj);
            // }
        }else{
            echo "Connection could not be established.<br />";
            die( print_r( sqlsrv_errors(), true));
        }
        return redirect()->route('integration.index');
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
        return view('edit');
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
        // $serverName = "VIETNHAN"; //serverName\instanceName
        // $connectionInfo = array( "Database"=>"HR");
        // $conn = sqlsrv_connect( $serverName, $connectionInfo);
        // // echo "delete ne";
        // //$sql = "update employee set " .  $payroll->idEmployee . ',"' . $payroll->First_Name .'","'. $payroll->Last_Name .'",'. $payroll->SSN  .','. $payroll->Pay_Rate  .','. $payroll->PayRates_id  .','. $payroll->Vacation_Days  .','.$payroll->Paid_To_Date  .','. $payroll->Paid_Last_Year . ' where idEmployee = ' . $id .';';
        // DB::update('update employee set ... where idEmployee = ' . $id);
        // if( $conn ) {
        //     $sql = "delete from Personal where Employee_ID=" . $id;
        //     echo $sql;
        //     $personal = sqlsrv_query($conn, $sql);
        // }else{
        //     echo "Connection could not be established.<br />";
        //     die( print_r( sqlsrv_errors(), true));
        // }
        destroy($id);
        store($request);
        return redirect()->route('integration.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serverName = "VIETNHAN"; //serverName\instanceName
        $connectionInfo = array( "Database"=>"HR");
        $conn = sqlsrv_connect( $serverName, $connectionInfo);
        echo "delete ne";
        DB::delete('delete from employee where idEmployee = ' . $id);
        if( $conn ) {
            $sql = "delete from Personal where Employee_ID=" . $id;
            echo $sql;
            $personal = sqlsrv_query($conn, $sql);
        }else{
            echo "Connection could not be established.<br />";
            die( print_r( sqlsrv_errors(), true));
        }
        return redirect()->route('integration.index');

    }
}
