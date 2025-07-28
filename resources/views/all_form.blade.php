<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form View</title>
</head>
<body>
    <table>
        <thead>
            <tr><th>No</th><th>Data</th></tr>
        </thead>
        <tbody>
            @foreach( $all_forms as $form )
            <tr><td>{{ $form->id }}</td><td>{{$form->data}}</td></tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>