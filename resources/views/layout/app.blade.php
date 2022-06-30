<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Melodion</title>
</head>
<body>
    <header>
@include ('header')
    </header>

    <main>
@yield ('main')
    </main>

    <footer>
        @include('footer')
    </footer>
</body>
</html>
