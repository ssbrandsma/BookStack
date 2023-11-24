<?php

namespace BookStack\App\Http\Livewire;

use BookStack\Vehicle;
use RamonRietdijk\LivewireTables\Columns\Column;
use RamonRietdijk\LivewireTables\Columns\SelectColumn;
use RamonRietdijk\LivewireTables\Http\Livewire\LivewireTable;

class VehicleTable extends LivewireTable
{
    protected string $model = Vehicle::class;

    public function perPage():int
    {
        return 20;
    }

    protected function columns(): array
    {
        return [
            Column::make(__('Vehicle'), 'vin'),
            SelectColumn::make(__('Year'), 'modelyear')
            ->options(
                [
                    '5' => '1965',
                    '6' => '1966',
                ]
            )
            ->sortable()
            ->searchable(),
           // Column::make(__('Vehicle'), 'factory'),

            SelectColumn::make(__('Body'), 'body')
            ->options(
                [
                    '07' => 'Coupe',
                    '08' => 'Convertible',
                    '09' => 'Fastback',
                ]
            )
            ->sortable()
            ->searchable(),


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
            
        ];
    }

    protected function actions(): array
    {
        return [
           
        ];
    }
}