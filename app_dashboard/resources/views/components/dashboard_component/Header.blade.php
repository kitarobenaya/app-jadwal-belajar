    <header class="w-full h-auto flex flex-col justify-center items-center gap-y-2">
        <span class="text-[2.5rem] font-bold text-lightTextMain">{{ $title }}</span>
        <h1 class="text-base font-semibold text-lightTextMain text-center">{{ $h1 }}</h1>
        <h2 class="text-center text-lg font-semibold text-lightTextMain">Hello, {{ auth()->user()->name }}!</h2>
        <p class="text-center text-sm text-lightTextMain">Let's Schedule Your Study</p>
    </header>