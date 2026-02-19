@extends('layout.layout')

@section('title', 'Stuart | Login')

@section('navbar')
    <x-auth_component.Navbar />
@endsection

@section('header')
    <x-dashboard_component.Header title="Stuart." h1="Stuart |  Login" />
@endsection

@section('content')
<form action="/login" method="POST">
    @csrf

    <fieldset class="fieldset bg-lightCardBackground border-base-300 rounded-box w-xs border p-4">
        <legend class="fieldset-legend text-black">Login</legend>

        <label class="label text-black" for="email">Email</label text-black>
        <input type="email" class="input" id="email" name="email" placeholder="Your Email" />

        <label class="label text-black" for="password">Password</label>
        <input type="password" class="input" id="password" name="password" placeholder="Your Password" />

        <button class="btn btn-neutral mt-4">Login</button>
        <p class="text-sm/6 text-gray-400 text-right">Don't have an account? <a href="/register" class="underline">Register</a></p>
    </fieldset>
</form>

<x-dashboard_component.Alert type="email" />
@endsection