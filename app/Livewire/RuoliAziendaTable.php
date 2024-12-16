<?php

namespace App\Livewire;

use App\Traits\AuthorizesRoleOrPermission;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;
use Spatie\Permission\Models\Role;

class RuoliAziendaTable extends DataTableComponent
{
    use AuthorizesRoleOrPermission;

    public $id_azienda;

    public function builder(): Builder
    {
        return Role::where('team_id', $this->id_azienda);
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

        $this->setSearchPlaceholder('Cerca tra i Ruoli');
        $this->setEmptyMessage('Nessun ruolo trovato, prova a cambiare la tua ricerca');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')
                ->hideIf(true),

            Column::make('Ruolo', 'name')
                ->searchable()
                ->sortable(),

            ComponentColumn::make('Azioni', 'id')
                ->component('azioni-ruoli-azienda')
                ->attributes(fn ($value, $row, Column $column) => [
                    'value' => $value,
                    'id_azienda' => $this->id_azienda,
                ]),
        ];
    }
}
