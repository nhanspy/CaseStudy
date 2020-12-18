<head>
<title>Create New</title>
</head>
<body>
    <div align="center">
        <h1>Create New Integate</h1>
        <br />
        <form action="{{ route('integration.store') }}" method="post">
            {{ csrf_field() }}
            <table border="0" cellpadding="10">
                <tr>
                    <td>Employee_ID:</td>
                    <td><input type="text" name = "Employee_ID" /></td>
                </tr>
                <tr>
                    <td>Employee_Number:</td>
                    <td><input type="text" name="Employee_Number" /></td>
                </tr>
                <tr>
                    <td>First_Name:</td>
                    <td><input type="text" name="First_Name" /></td>
                </tr>
                <tr>
                    <td>Last_Name:</td>
                    <td><input type="text" name="Last_Name" /></td>
                </tr>
                <tr>
                    <td>Middle_Initial:</td>
                    <td><input type="text" name="Middle_Initial" /></td>
                </tr> 
                <tr>
                    <td>Address1:</td>
                    <td><input type="text" name="Address1" /></td>
                </tr>
                <tr>
                    <td>Address2:</td>
                    <td><input type="text" name="Address2" /></td>
                </tr>
                <tr>
                    <td>City:</td>
                    <td><input type="text" name="City" /></td>
                </tr>
                <tr>
                    <td>State:</td>
                    <td><input type="text" name="State" /></td>
                </tr>
                <tr>
                    <td>Zip:</td>
                    <td><input type="text" name="Zip" /></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="Email" /></td>
                </tr>
                <tr>
                    <td>Phone_Number:</td>
                    <td><input type="text" name="Phone_Number" /></td>
                </tr>
                <tr>
                    <td>Social_Security_Number:</td>
                    <td><input type="text" name="Social_Security_Number" /></td>
                </tr>
                <tr>
                    <td>Drivers_License:</td>
                    <td><input type="text" name="Drivers_License" /></td>
                </tr>
                <tr>
                    <td>Marital_Status:</td>
                    <td><input type="text" name="Marital_Status" /></td>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td><input type="text" name="Gender" /></td>
                </tr>
                <tr>
                    <td>Shareholder_Status:</td>
                    <td><input type="text" name="Shareholder_Status" /></td>
                </tr>
                <tr>
                    <td>Benefit_Plans:</td>
                    <td><input type="text" name="Benefit_Plans" /></td>
                </tr>  
                <tr>
                    <td>Ethnicity:</td>
                    <td><input type="text" name="Ethnicity" /></td>
                </tr>  
                <tr>
                    <td>SSN:</td>
                    <td><input type="text" name="SSN" /></td>
                </tr>  
                <tr>
                    <td>Pay_Rate:</td>
                    <td><input type="text" name="Pay_Rate" /></td>
                </tr>  
                <tr>
                    <td>PayRates_id:</td>
                    <td><input type="text" name="PayRates_id" /></td>
                </tr>  
                <tr>
                    <td>Vacation_Days:</td>
                    <td><input type="text" name="Vacation_Days" /></td>
                </tr>  
                <tr>
                    <td>Paid_To_Date:</td>
                    <td><input type="text" name="Paid_To_Date" /></td>
                </tr>  
                <tr>
                    <td>Paid_Last_Year:</td>
                    <td><input type="text" name="Paid_Last_Year" /></td>
                </tr>                            
                <tr>
                    <td colspan="2"><button type="submit">Save</button> </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>