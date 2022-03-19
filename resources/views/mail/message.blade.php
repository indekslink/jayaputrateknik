<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Messages</title>
    <style>
        a {
            padding: 1rem 1.5rem;
            display: inline-block;
            text-decoration: none;
            background-color: gray;
            color: white;
            text-align: center;

        }
    </style>
</head>

<body>
    <p>Halo, Saya <strong>{{$details['first_name']}} {{$details['last_name']}}</strong></p>
    <p>Berikut isi pesan saya:</p>
    <p>
        {{$msg}}
    </p>


    <a href="mailto:{{$details['email']}}">Balas Pesan</a>

</body>

</html>