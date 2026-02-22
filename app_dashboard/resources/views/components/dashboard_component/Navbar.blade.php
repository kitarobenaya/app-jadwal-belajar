<nav class="navbar w-[80%] md:w-[60%] h-24 flex flex-col items-center fixed bottom-10 z-100">
    @if (request()->routeIs('dashboard.form_edit-study-day'))
        <div class="sub-nav absolute w-[70%] h-fit py-4 flex flex-row justify-center items-center bg-white shadow-xl rounded-t-full -z-1 border border-lightBorder">
            <a href="{{ route('dashboard.form_edit-study-day', $studyDayId) }}" 
            class="p-2 
            @if(request()->routeIs('dashboard.form_edit-study-day')) 
                bg-lightAccent rounded-full text-white  
            @else 
                text-black 
            @endif">
                <x-heroicon-s-pencil-square class="w-5 h-5" /> 
            </a>
        </div>
    @endif

    @if(request()->routeIs('dashboard.form_edit-study-list'))
        <div class="sub-nav-2 absolute w-[50%] h-fit py-4 flex flex-row justify-center items-center bg-white shadow-xl rounded-t-full -z-1 border border-lightBorder">
            <a href="{{ route('dashboard.form_edit-study-list', $studyDayId) }}" 
            class="p-2 
            @if(request()->routeIs('dashboard.form_edit-study-list')) 
                bg-lightAccent rounded-full text-white  
            @else 
                text-black 
            @endif">
                <x-heroicon-s-pencil-square class="w-5 h-5" /> 
            </a>
        </div>
    @endif

    @if (
        request()->routeIs('dashboard.study-list') ||
        request()->routeIs('dashboard.form-study-list') ||
        request()->routeIs('dashboard.form_edit-study-list')
    )
        <div class="sub-nav absolute w-[70%] h-fit py-4 flex flex-row justify-center items-center bg-white shadow-xl rounded-t-full -z-1 border border-lightBorder">
            <a href="{{ route('dashboard.study-list', $studyDayId) }}" 
            class="p-2 flex flex-col justify-center items-center gap-x-2 
            @if(request()->routeIs('dashboard.study-list')) 
                bg-lightAccent rounded-full text-white  
            @else 
                text-black 
            @endif"> 
                <x-heroicon-s-clipboard-document-list class="w-5 h-5" />
                <span class="text-sm">List</span>
            </a>

            <a href="{{ route('dashboard.form-study-list', $studyDayId) }}" 
            class="p-2 flex flex-col justify-center items-center gap-x-2 
            @if(request()->routeIs('dashboard.form-study-list')) 
                bg-lightAccent rounded-full text-white  
            @else 
                text-black 
            @endif">
                <x-heroicon-s-squares-plus class="w-5 h-5" />
                <span class="text-sm">Add</span>
            </a>
        </div>
    @endif

    <div class="size-full bg-white z-1 shadow-xl flex flex-row justify-center items-center gap-x-4 rounded-full border-2 border-lightBorder" id="navbar-wrapper">
        <a href="{{ route('dashboard.study-day') }}" class="p-3 flex flex-col justify-center items-center gap-x-2 @if(request()->routeIs('dashboard.study-day')) bg-lightAccent rounded-full text-white @else text-black @endif">
            <x-heroicon-s-home class="w-7 h-7" />
            <span class="text-sm">Home</span>
        </a>
        <a href="{{ route('dashboard.form-study-day') }}" class="p-3 flex flex-col justify-center items-center gap-x-2 @if(request()->routeIs('dashboard.form-study-day')) bg-lightAccent rounded-full text-white @else text-black @endif">
            <x-heroicon-s-squares-plus class="w-7 h-7" />
            <span class="text-sm">Add</span>
        </a>

        <div class="toggle-theme bg-black p-3 flex justify-center items-center rounded-full z-50">
            <x-heroicon-s-moon class="w-7 h-7 cursor-pointer text-lightBackground" />
        </div>
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="p-3 flex flex-col justify-center items-center gap-x-2 cursor-pointer @if(request()->routeIs('logout')) bg-lightAccent rounded-full text-white @else text-black @endif">
                <x-uiw-logout class="w-7 h-7" />
                <span class="text-sm">Logout</span>
            </button>
        </form>
    </div>
</nav>