<?php

namespace Nanuc\LaravelAdmin\Modules\Users\Livewire;

use Illuminate\Support\Arr;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class UsersTable extends DataTableComponent
{
    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->sortable()
                ->searchable(),
            Column::make('Name')
                ->sortable()
                ->searchable(),
            Column::make('E-mail', 'email')
                ->sortable()
                ->searchable(),
            Column::make('Created At', 'created_at')
                ->sortable(),
            Column::make('Impersonate')
                ->format(function($value, $column, $row) {
                    return
                        '<a wire:click.prevent="impersonate(' . $row->id . ')" href="#" class="text-gray-400 hover:text-gray-900">
                            <x-heroicon-o-plus-circle class="h-6 w-6"/>
                        </a>';
                })
                ->asHtml(),
        ];
    }

    public function query()
    {
        return config('laravel-admin.user-model')::query();
    }

    public function impersonate($user)
    {
        auth()->user()->impersonate(config('laravel-admin.user-model')::find($user));
        return redirect()->route(config('laravel-admin.back-to-app-route'));
    }
}
