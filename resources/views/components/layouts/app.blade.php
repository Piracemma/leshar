<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'LeShar' }}</title>

        <link rel="icon" type="image/x-icon" href="{{ url('/img/leshar.ico') }}" />
        <meta name="theme-color" content="#171717" />
        <meta name="apple-mobile-web-app-status-bar-style" content="#171717" />

        @persist('tallstackui')
        <tallstackui:script />
        @endpersist
        @livewireStyles
        
        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="min-h-screen bg-neutral-950">
        <x-toast />

        <livewire:navbar />

        {{ $slot }}        

        @livewireScripts 
    </body>
</html>
