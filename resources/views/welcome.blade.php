<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TryCat</title>
    {{-- @vite('/resources/css/app.css') --}}
    @vite(['/resources/js/app.js', '/resources/css/app.css'])
    <script src="//unpkg.com/alpinejs" defer></script>
    {{-- <link rel="stylesheet" href="/resources/css/app.css">
    <script src="/resources/js/app.js"></script> --}}
</head>

<body>

    <div id="game" x-data="game"
    @keyup.window="onKeyPress($event.key)"
    >
        <template x-for="row in board">
            <div class="row">
                <template x-for="tile in row">
                    <div class="tile" x-text="tile.letter">
                    </div>
                </template>
            </div>
        </template>
    </div>

</body>

</html>
