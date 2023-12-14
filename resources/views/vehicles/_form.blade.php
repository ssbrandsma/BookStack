<div class="content-center border border-black">

<div class="flex flex-row border border-black">
  <div class="basis-1/4">01</div>
  <div class="basis-1/4">02</div>
  <div class="basis-1/2">03</div>
</div>

    <div class="grid grid-cols-2 gap-4">
        <div>{{ Form::label('vin', 'VIN', ['class' => 'text-gray-500 font-bold']) }}</div>
        <div>{{ Form::text('vin', null, ['class' => 'appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-800', 'placeholder' => 'Enter VIN']) }}</div>
    </div>
</div>

<div class="text-center">
            {{ Form::submit('Save', ['class' => 'bg-blue-500 text-white font-bold py-2 px-4 rounded']) }}
</div>