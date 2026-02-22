<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/css/style.css','resources/js/app.js', 'resources/js/ballSlider.js'])
    <title>@yield('title')</title>
</head>
<body class="w-full h-auto relative bg-lightBackground font-inter flex flex-col items-center pt-6">
    @yield('navbar')

    @yield('header')

    <main class="w-full min-h-screen pt-12 flex flex-col items-center 
    @if (request()->routeIs('dashboard.index') && $all_schedules->count() > 2)
        pb-22
    @endif
    
    @if (request()->routeIs('dashboard.study-list') && $study_lists->count() > 3)
        pb-38
    @endif
    
    @if (request()->routeIs('dashboard.form_edit-study-list'))
        pb-60
    @endif
    ">
        @yield('content')
    </main>
</body>
</html>