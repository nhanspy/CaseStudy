<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeModel extends Model
{
    //
    protected $table = "employee";
    protected $fillable = [
        "idEmployee",
        "Last_Name",
        "First_Name",
        "SSN",
        "Pay_Rate",
        "PayRates_id",
        "Vacation_Days",
        "Paid_To_Date",
        "Paid_Last_Year"
    ];
}
