<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GitLab Seats</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="flex flex-col min-h-screen justify-center items-center">

<a href="{{ action('Auth\LoginController@redirectToProvider') }}" class="flex justify-center items-center rounded border border-gray-400 py-2 px-4 pl-8">
    Login with GitLab

    <svg class="w-12 ml-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 586 559">
        <defs>
            <style>
                .cls-1{fill:#fc6d26}.cls-2{fill:#e24329}.cls-3{fill:#fca326}
            </style>
        </defs>
        <g id="g44">
            <path id="path46" d="M461.17 301.83l-18.91-58.12-37.42-115.28a6.47 6.47 0 00-12.27 0l-37.42 115.21H230.82L193.4 128.43a6.46 6.46 0 00-12.26 0l-37.36 115.21-18.91 58.19a12.88 12.88 0 004.66 14.39L293 435l163.44-118.78a12.9 12.9 0 004.73-14.39" class="cls-1"/>
        </g>
        <g id="g48">
            <path id="path50" d="M293 434.91l62.16-191.28H230.87L293 434.91z" class="cls-2"/>
        </g>
        <g id="g56">
            <path id="path58" d="M293 434.91l-62.18-191.28h-87L293 434.91z" class="cls-1"/>
        </g>
        <g id="g64">
            <path id="path66" d="M143.75 243.69l-18.91 58.12a12.88 12.88 0 004.66 14.39L293 435 143.75 243.69z" class="cls-3"/>
        </g>
        <g id="g72">
            <path id="path74" d="M143.78 243.69h87.11l-37.49-115.2a6.47 6.47 0 00-12.27 0l-37.35 115.2z" class="cls-2"/>
        </g>
        <g id="g76">
            <path id="path78" d="M293 434.91l62.16-191.28h87.14L293 434.91z" class="cls-1"/>
        </g>
        <g id="g80">
            <path id="path82" d="M442.24 243.69l18.91 58.12a12.85 12.85 0 01-4.66 14.39L293 434.91l149.2-191.22z" class="cls-3"/>
        </g>
        <g id="g84">
            <path id="path86" d="M442.28 243.69h-87.1l37.42-115.2a6.46 6.46 0 0112.26 0l37.42 115.2z" class="cls-2"/>
        </g>
    </svg>
</a>

</body>
</html>
