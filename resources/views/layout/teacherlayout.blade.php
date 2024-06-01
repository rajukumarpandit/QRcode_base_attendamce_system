@php
    use Illuminate\Support\Facades\Route;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Login')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        @hasSection('content')
            @yield("content")
        @else
            <h2>No Content Found !</h2>
        @endif
    </div>
    <div class="container-fluid bg-info">
        <p class="text-center p-3">2024&copy;Copyright</p>
    </div>
    @stack('scripts')
    @stack('style')
</body>
</html>