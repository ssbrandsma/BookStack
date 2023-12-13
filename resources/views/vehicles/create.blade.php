<!-- resources/views/vehicles/create.blade.php -->

<link rel="stylesheet" href="/dist/livewire.css">
@livewireStyles
@livewireScripts

@extends('layouts.base')

@section('content')

<div class="flex flex-row">
    <div class="basis-1/4"> <!-- Grid cell -->
       A
    </div>
    <div class="basis-1/4"> <!-- Grid cell -->
       B
    </div>
    <div class="basis-1/4">
       C
    </div>
    <div class="basis-1/4">
       D
    </div>
</div>

<div className="flex flex-wrap w-full">
    <h1>Create new Vehicle</h1>

    <!-- Form to create a new vehicle -->
    {{ Form::open(['route' => 'vehicles.store', 'method' => 'post', 'class' => 'w-full']) }}
        @csrf
        @include('vehicles._form')
    {{ Form::close() }}
</div>
@endsection
