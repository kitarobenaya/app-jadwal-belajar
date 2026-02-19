<?php 
use Carbon\Carbon;
?>

@extends('layout.layout')
@section('title', 'Stuart | Add Study List Form')

@section('navbar')
    <x-dashboard_component.Navbar studyDayId="{{ $studyDay->study_days_id }}"  />
@endsection

@section('header')
    <x-dashboard_component.Header title="Stuart." h1="Stuart |  Add Study List Form" />
@endsection

@section('content')
        <form action="{{ route('dashboard.store-study-list') }}" method="post" class="w-[80%] flex flex-col items-center rounded-3xl p-4 bg-white outline-2 outline-lightBorder shadow-xl">
            @csrf

            <h1 class="text-2xl font-semibold text-lightTextMain text-center">Add New Study List at {{ Carbon::parse($studyDay->date)->format(('l')) }}, {{ $studyDay->date }}</h1>

            <div class="input-wrapper w-full flex flex-col rounded-2xl p-4">
                <label for="title" class="text-lg font-semibold text-black">Title</label>
                <input type="text" name="title" id="title" maxlength="255" class="bg-lightPrimary p-1 w-full text-base placeholder:text-gray-400 focus:outline-lightAccent focus:outline-2 rounded-lg text-black">
            </div>

            <div class="input-wrapper w-full flex flex-col rounded-2xl p-4">
                <label for="description" class="text-lg font-semibold text-black">Description</label>
                <input type="text" name="description" id="description" class="bg-lightPrimary p-1 w-full text-base placeholder:text-gray-400 focus:outline-lightAccent focus:outline-2 rounded-lg text-black">
            </div>

            <div class="two-row-input flex flex-row justify-center items-center h-fit w-full">

                <div class="input-wrapper w-full flex flex-col rounded-2xl p-4">
                    <label for="start_time" class="text-lg font-semibold text-black">Time</label>
                    <input type="time" name="start_time" id="start_time" class="bg-lightPrimary p-1 w-full text-base placeholder:text-gray-400 focus:outline-lightAccent focus:outline-2 rounded-lg text-black">
                </div>

                <div class="flex flex-col">
                    <span>To</span>
                    <span class="text-lg font-semibold text-black h-full">To</span>
                </div>

                <div class="input-wrapper w-full flex flex-col rounded-2xl p-4">
                    <label for="end_time" class="text-lg font-semibold">Time 2</label>
                    <input type="time" name="end_time" id="end_time" class="bg-lightPrimary p-1 w-full text-base placeholder:text-gray-400 focus:outline-lightAccent focus:outline-2 rounded-lg text-black">
                </div>

            </div>

            <input type="hidden" name="study_days_id" value="{{ $studyDay->study_days_id }}">

            <button type="submit" class="bg-lightPrimary w-[40%] h-8 mt-2 rounded-xl font-semibold outline-2 outline-lightBorder cursor-pointer text-black">Add</button>
        </form>

        @if(session('success') || session('error'))
            <x-dashboard_component.Alert type="{{ session('success') ? 'success' : 'error' }}" />
        @endif

        <script>
            const title = document.getElementById("title");
            title.focus();
            window.scrollTo(0, 0);
        </script>
@endsection