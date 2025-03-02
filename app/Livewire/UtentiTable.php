<?php

namespace App\Livewire;

use App\Models\User;
use App\Traits\AuthorizesRoleOrPermission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;

class UtentiTable extends DataTableComponent
{
    use AuthorizesRoleOrPermission;

    public $action = 'utente';

    public function builder(): Builder
    {
        return User::query();
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setPerPageVisibilityStatus(false);
        $this->setColumnSelectStatus(false);
        $this->setPerPage(10);

        $this->setDefaultSort('name');

        $this->setQueryStringDisabled();
        $this->setQueryStringForFilterDisabled();
        $this->setQueryStringForSearchDisabled();
        $this->setQueryStringForSortDisabled();

        $this->setTableAttributes([
            'class' => 'table table-rounded table-row-bordered border gy-4 gs-6 fs-6',
            'default' => false,
        ]);

        $this->setThAttributes(function($column) {
            return [
                'class' => 'fw-bold text-gray-600 text-uppercase',
            ];
        });

        $this->setTdAttributes(function(Column $column, $row, $columnIndex, $rowIndex) {
            return [
                'class' => 'align-middle text-nowrap',
            ];
        });

        $this->setSearchPlaceholder('Cerca tra gli Utenti');
        $this->setEmptyMessage('Nessun utente trovato, prova a cambiare la tua ricerca');

        $this->setConfigurableAreas([
            'toolbar-right-start' => [
                'partials.button.new', [
                    'action' => $this->action,
                    'modal' => 'aggiungi-utente',
                ],
            ],
        ]);
    }

    public function columns(): array
    {
        return [
            Column::make('Nome', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Email', 'email')
                ->searchable(),

            Column::make('Aziende', 'id')
                ->label(function($row, Column $column) {
                    return implode(', ', $row->aziende()->pluck('nome')->toArray());
                }),

            Column::make('Ruoli', 'id')
                ->label(function($row, Column $column) {
                    return implode(', ', $row->getRoleNames()->toArray());
                }),

            Column::make('Gruppi', 'id')
                ->label(function($row, Column $column) {
                    return implode(', ', $row->teams()->pluck('name')->toArray());
                }),

            BooleanColumn::make('Attivo', 'active')
                ->sortable(),

            ComponentColumn::make('Azioni', 'id')
                ->component('azioni-utenti')
                ->attributes(fn ($value, $row, Column $column) => [
                    'value' => $value,
                ]),
        ];
    }
}
