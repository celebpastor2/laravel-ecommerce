<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('create-product')}}" method="post" enctype="multipart/formdata">
        @csrf
        <input type="text" name="name">
        <textarea name="desc" id="desc"></textarea>
    </form>
</body>
</html>