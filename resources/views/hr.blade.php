<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HR</title>
</head>
<body>
    <div align="center">
        <h1>HR</h1>
        <a href="db/create">Create New Person</a>
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
                @foreach($person as $p)
                <tr>
                    {{-- <td>{{$e->idEmployee}}</td> --}}
                    @foreach($p as $value)
                        <td>{{$value}}</td>
                    @endforeach
                    <td>
                        <a>
                            <a href="/@{'/edit/' + ${product.id}}">Edit</a>
                            &nbsp;&nbsp;&nbsp;
                            <a href="/@{'/delete/' + ${product.id}}">Delete</a>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</body>
</html>