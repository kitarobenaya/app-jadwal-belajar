@extends('layout.layout')
@section('title', 'Stuart | Add Schedule Form')

@section('navbar')
    <x-dashboard_component.Navbar studyDayId="{{ $studyDay->id }}" />
@endsection

@section('header')
    <x-dashboard_component.Header title="Stuart." h1="Stuart |  Edit Study Day Form" />
@endsection

@section('content')
    <form action="{{ route('dashboard.update-study-day', $studyDay->id) }}" method="POST" class="w-[80%] flex flex-col items-center gap-y-2 rounded-3xl p-4 bg-white outline-2 outline-lightBorder shadow-xl">
        @csrf
        @method('PATCH')

        <h1 class="text-[1.5rem] font-semibold text-black">Edit Your Schedule</h1>

        <div class="input-wrapper w-full flex flex-col rounded-2xl p-4">
            <label for="date" class="text-lg font-semibold text-black">Date</label>
            <input type="date" name="date" id="date" class="bg-lightPrimary p-1 w-full text-base placeholder:text-gray-400 focus:outline-lightAccent focus:outline-2 rounded-lg text-black" value="{{ $studyDay->date }}">
        </div>

        <button type="submit" class="bg-lightPrimary w-[40%] h-8 rounded-xl font-semibold outline-2 outline-lightBorder cursor-pointer text-black">Update</button>
    </form>

    @if(session('success') || session('error'))
        <x-dashboard_component.Alert type="{{ session('success') ? 'success' : 'error' }}" />
    @endif

    <script>
        const date = document.getElementById("date");
        date.focus();
        window.scrollTo(0, 0);
    </script>
@endsection