<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name', 'Royal Crest Club')}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans antialiased bg-grey-100">
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{route('events.index')}}" class="font-semibold text-lg text-grey-800">
                Royal Crest Club 
            </a>
            <a href="{{route('events.index')}}" class="text-sm text-grey-600 hover:text-gray-900">
                All Events
            </a>
        </div>
    </nav>
    @if(isset($header))
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{$header}}
        </div>
    </header>
    @endif 
    <main>
        {{$slot}}
    </main>
    @livewireScripts
    
</body>
</html>