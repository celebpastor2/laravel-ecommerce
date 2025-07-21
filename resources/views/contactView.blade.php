<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Contacts</title>
</head>
<body>
    <main>
        <table>
            <thead>
                <tr>
                    <th>
                        Name
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Message
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($forms as $form )
                <tr>
                    <td>
                        {{$form->name}}
                    </td>
                    <td>
                        {{$form->email}}
                    </td>
                    <td>
                        {{$form->message}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</body>
</html>