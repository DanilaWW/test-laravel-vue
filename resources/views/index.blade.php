<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог книг</title>
    @vite(['resources/js/app.js'])
</head>
<body>
    <div id="app">
        <book-list></book-list>
    </div>
</body>
</html>