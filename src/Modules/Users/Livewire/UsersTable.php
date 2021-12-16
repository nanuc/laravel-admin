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
            Column::make('Impersonate', 'no-column')
                ->format(function($value, $column, $row) {
                    return
                        '<a wire:click.prevent="impersonate(' . $row->id . ')" href="#" class="text-gray-400 hover:text-gray-900">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
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
