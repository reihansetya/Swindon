<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Laravel' }}</title>
    <link rel="stylesheet" href="app.css">
    <link rel="shortcut icon" href="{{ asset('logo-swindon.png') }}" type="image/x-icon">
    @vite('resources/css/app.css')
</head>

<body>
    <x-navbar />
    <div class="container md:mx-auto px-6 {{ $class ?? '' }}">
        {{ $slot }}
    </div>
    <x-footer />
</body>

</html>
