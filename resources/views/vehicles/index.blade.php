
@livewireStyles
@extends('layouts.simple')

<link rel="stylesheet" href="dist/livewire.css">

@section('body')
@livewireScripts
<div class="container large">    
    <div class="livewire-table">
        <livewire:book-stack.app.http.livewire.vehicle-table/>
    </div>
</div>
@stop

