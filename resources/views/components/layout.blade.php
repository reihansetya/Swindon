@props(['container' => false, 'class' => null])
@props(['admin' => request()->is('admin') || request()->is('admin/*')])

<!DOCTYPE html>
<html data-theme="{{ $admin ? 'light' : 'business' }}" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Laravel' }}</title>
    <link rel="stylesheet" href="app.css">
    <link rel="shortcut icon" href="{{ asset('logo-url.png') }}" type="image/x-icon">
    @vite('resources/css/app.css')
</head>

<body>
    <x-navbar />
    <div class="container md:mx-auto {{ $class ?? '' }}">
        {{ $slot }}
    </div>
    <x-footer />
</body>

</html>
