<?php

namespace BookStack\App\Http\Livewire;

use BookStack\Vehicle;
use Illuminate\Support\Enumerable;
use RamonRietdijk\LivewireTables\Actions\Action;
use RamonRietdijk\LivewireTables\Columns\Column;
use RamonRietdijk\LivewireTables\Columns\SelectColumn;
use RamonRietdijk\LivewireTables\Filters\SelectFilter;
use RamonRietdijk\LivewireTables\Http\Livewire\LivewireTable;

class VehicleTable extends LivewireTable
{
    protected string $model = Vehicle::class;


    protected function columns(): array
    {
        return [
            Column::make(__('Vehicle'), 'vin')->searchable(),
            Column::make(__('Year'), 'modelyear'),
            Column::make(__('Plant'), 'factory'),
            Column::make(__('Body'), 'body'),
            Column::make(__('Trim'), 'trim'),
            Column::make(__('Dso'), 'dso'),
            Column::make(__('Axle'), 'axle'),
            Column::make(__('Engine'), 'engine'),
            Column::make(__('Transmission'), 'trans'),
            Column::make(__('Date'), 'date'),

            Column::make(__('Actions'), function (Vehicle $model): string {
                return '<a class="underline" href="/vehicles/edit/'.$model->getKey().'"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"></path>
            </svg></a>';
            })
                ->clickable(false)
                ->asHtml(),

        ];
    }

    protected function filters(): array
    {

        return [

            SelectFilter::make(__('Year'), 'modelyear')
                ->options(
                    [
                        '5' => '1965',
                        '6' => '1966',
                    ]
                ),

            SelectFilter::make(__('Body'), 'body')
                ->options(
                    [
                        '07' => 'Coupe',
                        '08' => 'Convertible',
                        '09' => 'Fastback',
                    ]
                ),

            SelectFilter::make(__('Factory'), 'factory')
                ->options(
                    [
                        'F' => 'Dearborn, MI',
                        'R' => 'San Jose, CA',
                        'T' => 'Metuchen, NJ',
                        'AN' => 'Amsterdam',
                        'MEX' => 'Mexico',
                    ]
                ),

        ];
    }

    protected function actions(): array
    {
        return [
         
        ];
    }
}