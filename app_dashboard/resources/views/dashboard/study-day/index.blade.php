@extends('layout.layout')
@section('schedules')
@section('title', 'Stuart | Dashboard')

@section('navbar')
    <x-dashboard_component.Navbar />
@endsection

@section('header')
    <x-dashboard_component.Header title="Stuart." h1="Stuart |  Dashboard" />
@endsection

@section('content')
    <div class="container-card w-[90%] h-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-y-4">
        @if ($all_schedules->count())
            @foreach ($all_schedules as $schedule)
                <x-dashboard_component.study-day.Card id="{{ $schedule->id }}" studyDayId="{{ $schedule->study_days_id }}" date="{{ $schedule->date }}"/>
            @endforeach
        @else
            <p class="mt-30 text-lightTextMain">You dont have any schedule yet. <a href="{{ route('dashboard.form-study-day') }}" class="underline">Create One.</a></p>
        @endif
    </div>

    @if(session('success') || session('error'))
        <x-dashboard_component.Alert type="{{ session('success') ? 'success' : 'error' }}" />
    @endif
@endsection