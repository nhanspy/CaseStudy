<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Integrate</title>
</head>
<body>
    <div align="center">
        {{-- ------------------------------------------------------------------ --}}
        <h1>Integration</h1>
        <a href="integration/create">Create New Person</a>
        <br/><br/>
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    @foreach($title as $value)
                        <th>{{$value}}</th>
                    @endforeach
                    <th>Edit/Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($integrate as $p)
                <tr>
                    {{-- <td>{{$e->idEmployee}}</td> --}}
                    @foreach($p as $value)
                        <td>{{$value}}</td>
                    @endforeach
                    <td>
                        <a>
                            <a type="button" href="integration/{{$p['Employee_ID']}}/edit">Edit</a>
                            &nbsp;&nbsp;&nbsp;
                        </a>
                        <form action="{{ url('/integration', ['id' => $p['Employee_ID']]) }}" method="post">
                            <input class="btn btn-default" type="submit" value="Delete" />
                            <input type="hidden" name="_method" value="delete" />
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <br><br><br>
{{-- //----------------------------------------------------------------- --}}
        <h1>HR</h1>
        <br/><br/>
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    @foreach($titleHR as $value)
                        <th>{{$value}}</th>
                    @endforeach
                    <th>Edit/Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hr as $p)
                <tr>
                    {{-- <td>{{$e->idEmployee}}</td> --}}
                    @foreach($p as $value)
                        <td>{{$value}}</td>
                    @endforeach
                    <td>
                        <a>
                            <a type="button" href="hr/{{$p['Employee_ID']}}/edit">Edit</a>
                            &nbsp;&nbsp;&nbsp;
                        </a>
                        <form action="{{ url('/hr', ['id' => $p['Employee_ID']]) }}" method="post">
                            <input class="btn btn-default" type="submit" value="Delete" />
                            <input type="hidden" name="_method" value="delete" />
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <br><br><br>
{{-- ------------------------------------------------------------------------------------- --}}
        <h1>Pay roll</h1>
        <a href="db/create">Create New Employee</a>
        <br/><br/>
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    @foreach($titlePR as $value)
                        <th>{{$value}}</th>
                    @endforeach
                    <th>Edit/Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payroll as $p)
                <tr>
                    {{-- <td>{{$e->idEmployee}}</td> --}}
                    @foreach($p as $value)
                        <td>{{$value}}</td>
                    @endforeach
                    <td>
                        <a>
                            <a type="button" href="payroll/{{$p['idEmployee']}}/edit">Edit</a>
                            &nbsp;&nbsp;&nbsp;
                        </a>
                        <form action="{{ url('/payroll', ['id' => $p['idEmployee']]) }}" method="post">
                            <input class="btn btn-default" type="submit" value="Delete" />
                            <input type="hidden" name="_method" value="delete" />
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

</body>
</html>