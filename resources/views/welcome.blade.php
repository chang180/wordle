<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TryCat</title>
    @vite('/resources/css/app.css')
    <script src="//unpkg.com/alpinejs" defer></script>
    {{-- @vite(['/resources/js/app.js', '/resources/css/app.css']) --}}
    {{-- <link rel="stylesheet" href="/resources/css/app.css">
    <script src="/resources/js/app.js"></script> --}}
</head>

<body>

    <div id="game" x-data="{
        guessAllowed: 4,
        wordLength: 3
    }">
        <template x-for="row in Array.from({ length: guessAllowed})">
            <div class="row">
                <template x-for="tile in Array.from({ length: wordLength})">
                    <div class="tile">
                    </div>
                </template>
            </div>
        </template>
    </div>

</body>

</html>
