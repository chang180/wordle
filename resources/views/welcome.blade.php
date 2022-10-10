<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wordle</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">

    {{-- @vite('/resources/css/app.css') --}}
    @vite(['/resources/js/app.js', '/resources/css/app.css'])
    <script src="//unpkg.com/alpinejs" defer></script>
    {{--
    <link rel="stylesheet" href="/resources/css/app.css">
    <script src="/resources/js/app.js"></script> --}}
</head>

<body>
    <main x-data="game" @keyup.window="onKeyPress($event.key)">
        <h1 aria-label="Wordle" class="svg_img">
            <img src="{{ asset('images/wordle.svg') }}">
        </h1>
        <div id="game">
            <template x-for="(row, index) in board">
                <div class="row" :class="{'current' : currentRowIndex === index, 'invalid' : currentRowIndex === index && errors }">
                    <template x-for="tile in row">
                        <div class="tile" :class="tile.status" x-text="tile.letter">
                        </div>
                    </template>
                </div>
            </template>
        </div>

        <div id="keyboard" @click.stop="$event.target.matches('button') && onKeyPress($event.target.textContent)">
            <template x-for="row in letters">
                <div class="row">
                    <template x-for="key in row">
                        <button 
                            type="button" 
                            x-text="key"
                        ></button>
                    <div class="key"></div>
                </div>
            </template>
        </div>

        <output x-text="message"></output>
    </main>
</body>

</html>
