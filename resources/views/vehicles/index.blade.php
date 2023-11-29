
@livewireStyles
<link rel="stylesheet" href="dist/livewire.css">
@livewireScripts

@extends('layouts.base')

@section('content')


<div class="w-full mx-auto">
    <div class="livewire-table">
        <livewire:book-stack.app.http.livewire.vehicle-table/>
    </div>
</div>


@stop






