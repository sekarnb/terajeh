@extends('layouts.app', ['title' => 'Dashboard'])

@section('content')
<h1 class="mt-20 text-4xl">Selamat datang, <span class="font-bold">{{ auth()->user()->username }}</span>!</h1>

<div class="mt-8 w-full h-2/3 rounded-2xl">
    <img class="object-cover w-full h-full rounded-2xl" src="{{ asset('assets/img/dashboard.png') }}" alt="Dashboard Graphic" />
</div>
@endsection
