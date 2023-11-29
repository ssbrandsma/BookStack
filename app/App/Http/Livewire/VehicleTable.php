<?php

namespace BookStack\App\Http\Livewire;

use BookStack\Vehicle;
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