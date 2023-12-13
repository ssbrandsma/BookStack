<!-- resources/views/vehicles/create.blade.php -->

<link rel="stylesheet" href="/dist/livewire.css">
@livewireStyles
@livewireScripts

@extends('layouts.base')
@section('content')

<div className="flex flex-wrap w-full border border-4 border-black">
    <h1>Create new Vehicle</h1>

    <!-- Form to create a new vehicle -->
    {{ Form::open(['route' => 'vehicles.store', 'method' => 'post', 'class' => 'w-full']) }}
        @csrf
        @include('vehicles._form')
    {{ Form::close() }}
</div>
@endsection
