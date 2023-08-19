<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=c">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kontakt form</title>
</head>
<body>
    <h1>Message</h1>
    <p>Name : {{$details['name']}}</p>
    <p>Telefon : {{$details['telefon']}}</p>
    <p>Email : {{$details['email']}}</p>
    <p>Betreff : {{$details['betreff']}}</p>
    <p>Nachricht : {{$details['nachricht']}}</p>
</body>
</html>