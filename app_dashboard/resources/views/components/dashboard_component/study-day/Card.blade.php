<?php 
use Carbon\Carbon;
?>

<div class="relative w-[95%] bg-white h-auto rounded-lg shadow-lg p-5 gap-y-2 flex flex-col border border-lightBorder mx-auto">

    <div class="size-fit absolute right-1 top-1 cursor-pointer z-2 flex" type="button">
        <x-uiw-setting class="w-4 h-4 z-1 text-black" />
        <div class="overlay open-control-menu w-4 h-4 z-2 rounded-full absolute"></div>
    </div>

    <div class="control-menu grow-shrink-anim absolute w-[30%] h-30 bg-lightPrimary top-2 right-2 rounded-full rounded-tr-none flex flex-row justify-center items-center gap-x-2">

        <div class="size-fit top-1 right-1 absolute cursor-pointer z-2 flex" type="button">
            <x-uiw-circle-close class="w-6 h-6 z-1 text-black" />
            <div class="overlay close-control-menu w-6 h-6 z-2 rounded-full absolute"></div>
        </div>

        <a href="{{ route('dashboard.form_edit-study-day', $id) }}">
            <x-heroicon-s-pencil-square class="w-8 h-8 bg-white rounded-full p-1 cursor-pointer text-black" /> 
        </a>

        <button type="submit" form="delete-study-day-form-{{ $id }}">
            <x-heroicon-s-trash class="w-8 h-8 text-red-500 bg-white rounded-full p-1 cursor-pointer" />
        </button>

    </div>

    <div class="w-full h-auto flex flex-col justify-center items-center p-4 rounded-lg border-2 border-lightBorder bg-white">
        <h2 class="text-lightTextSecondary w-full text-2xl font-medium">{{ Carbon::parse($date)->format('l') }}, <br /> {{ $date }}</h2>
        <p class="text-xs w-full text-lightTextSecondary">See Your Study Schedule at {{ $date }}</p>
    </div>

    <div class="w-full h-8 relative bg-lightAccent rounded-full text-white font-bold text-md flex flex-row justify-center items-center shadow-lg">
        <x-uiw-right-circle class="ball h-8 w-8 absolute left-0 cursor-grabbing" />
        <input type="text" name="study_day_id" value="{{ $studyDayId }}" id="{{ $studyDayId }}" hidden>
        <p class="text-center text-gray-200/80 text-[0.7rem]" id="sliderMessage">Slide to see your study schedule >></p>
    </div>

    <form id="delete-study-day-form-{{ $id }}" action="{{ route('dashboard.delete-study-day', $id) }}" method="post">
        @csrf
        @method('DELETE')
        
    </form>
    
</div>
