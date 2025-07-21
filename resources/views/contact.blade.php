<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Contact Form Page</h2>
    <div>
        <form action="{{ route('submit') }}" method="post">
            @csrf
        <div>
            <label for="name">Enter Your Name</label>
            <input type="text" name="name" id="name" >
        </div>
        <div>
            <label for="email">Enter Your Email</label>
            <input type="email" name="email" id="email" >
        </div>
        <div>
            <label for="message">Enter Your Message</label>
            <textarea name="message" id="message"></textarea>
        </div>
        <div>
            <button type="submit">Submit Now</button>
        </div>
        </form>
    </div>
</body>
</html>