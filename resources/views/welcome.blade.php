<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Figtree:wght@400;600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            body {
                font-family: 'Figtree', sans-serif;
                line-height: 1.5;
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100vh;
                margin: 0;
                background-color: #f0f4f8;
            }

            .welcome {
                text-align: center;
            }

            .title {
                font-size: 3rem;
                color: #1a202c;
            }

            .subtitle {
                margin-top: 1rem;
                font-size: 1.25rem;
                color: #4a5568;
            }
        </style>
    </head>
    <body>
        <div class="welcome">
            <div class="title">Welcome to Laravel</div>
            <div class="subtitle">This is the default Breeze welcome page</div>
        </div>
    </body>
</html>
