<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0,
          minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LARA 10 TO-DO-List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        .btn {
            @apply
            rounded-md px-2 py-1 text-center font-medium
            shadow-sm ring-1 ring-slate-700 hover:bg-amber-600 hover:text-white
        }
        label {
            @apply block uppercase text-slate-700 mb-2
        }
        input, textarea {
            @apply shadow-sm appearance-none border-2 w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none
        }
        .error-message {
            @apply text-red-700
        }
    </style>
    {{-- blade-formatter-enable --}}
</head>
<body class="container mx-auto mt-10 mb-10 max-w-lg">
<h1 class="text-2xl">@yield('title')</h1>
<div x-data="{flash:true}">
    @if(session()->has('successes'))
        <div x-show="flash"
             class="relative mb-10 border border-green-400 bg-green-200 px-4 py-3 text-lg text-green-700"
             role="alert">
            <strong class="font-bold">Success</strong>
            <div> {{session('successes')}} </div>
            <span class="absolute top-0 bottom-0 px-4 py-3 right-0">
             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                  stroke-width="1.5" @click="flash = false"
                  stroke="currentColor" class="h-6 w-6 cursor-pointer">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </span>
        </div>
    @endif
    @if(session()->has('status'))
        <div x-show="flash"
             class="relative mb-10 border border-green-400 bg-green-200 px-4 py-3 text-lg text-green-700"
             role="alert">
            <strong class="font-bold">Success</strong>
            <div> {{session('status')}} </div>
            <span class="absolute top-0 bottom-0 px-4 py-3 right-0">
             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                  stroke-width="1.5" @click="flash = false"
                  stroke="currentColor" class="h-6 w-6 cursor-pointer">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </span>
        </div>
    @endif
    @yield('content')
</div>
</body>
</html>
