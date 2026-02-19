@extends('layout.layout')

@section('title', 'Stuart | Register')

@section('navbar')
    <x-auth_component.Navbar />
@endsection

@section('header')
    <x-dashboard_component.Header title="Stuart." h1="Stuart |  Register" />
@endsection

@section('content')
<form action="/register" method="POST">
    @csrf

    <fieldset class="fieldset bg-lightCardBackground border-base-300 rounded-box w-xs border p-4">
        <legend class="fieldset-legend text-black">Register</legend>

        <label class="label text-black" for="name">Name</label>
        <input type="text" class="input" id="name" name="name" placeholder="Your name" required />

        <label class="label text-black" for="email">Email</label text-black>
        <input type="email" class="input" id="email" name="email" placeholder="Your Email" required />

        <label class="label text-black" for="password">Password</label>
        <input type="password" class="input" id="password" name="password" placeholder="Your Password" required />

        <button class="btn btn-neutral mt-4">Register</button>
        <p class="text-sm/6 text-gray-400 text-right">Already have an account? <a href="/login" class="underline">Login</a></p>
    </fieldset>
</form>
@endsection