<?php

namespace App\Livewire;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;

class AssociaDipendentiRuoloTable extends DataTableComponent
{
    public $id_azienda;
    public $id_ruolo;

    public function builder(): Builder
    {
        return User::whereHas('aziende', function ($query) {
            return $query->where('id_azienda', $this->id_azienda);
        });
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setPerPageVisibilityStatus(false);
        $this->setColumnSelectStatus(false);
        $this->setPerPage(10);

        $this->setDefaultSort('id');

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

        $this->setSearchPlaceholder('Cerca tra i Dipendenti');
        $this->setEmptyMessage('Nessun dipendente trovato, prova a cambiare la tua ricerca');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')
                ->sortable(),

            Column::make('Nome', 'name')
                ->searchable()
                ->sortable(),

            Column::make('Email', 'email')
                ->searchable()
                ->sortable(),

            ComponentColumn::make('Azioni', 'id')
                ->component('azioni-associa-dipendenti-ruolo')
                ->attributes(fn ($value, $row, Column $column) => [
                    'value' => $value,
                ]),
        ];
    }

    public function associa($id_utente)
    {
        $user = User::find($id_utente);
        $role = Role::find($this->id_ruolo);

        $user->assignRole($role->name);

        $this->dispatch('refreshDatatable');
    }
}
