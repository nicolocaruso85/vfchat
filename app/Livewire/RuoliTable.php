<?php

namespace App\Livewire;

use App\Models\Azienda;
use App\Traits\AuthorizesRoleOrPermission;
use Illuminate\Support\Facades\Auth;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;
use Spatie\Permission\Models\Role;

class RuoliTable extends DataTableComponent
{
    use AuthorizesRoleOrPermission;

    protected $model = Role::class;

    public $action = 'ruolo';

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setPerPageVisibilityStatus(false);
        $this->setColumnSelectStatus(false);
        $this->setPerPage(10);

        $this->setDefaultSort('id');

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

        $this->setSearchPlaceholder('Cerca tra i Ruoli');
        $this->setEmptyMessage('Nessun ruolo trovato, prova a cambiare la tua ricerca');

        $this->setConfigurableAreas([
            'toolbar-right-start' => [
                'partials.button.new', [
                    'modal'  => 'aggiungi-ruolo',
                    'action' => $this->action,
                ],
            ],
        ]);
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')
                ->sortable(),

            Column::make('Nome', 'name')
                ->searchable()
                ->sortable(),

            Column::make('Azienda', 'team_id')
                ->format(function ($value) {
                    if ($value) {
                        if ($azienda = Azienda::find($value)) {
                            return $azienda->nome;
                        }
                    }
                }),

            ComponentColumn::make('Azioni', 'id')
                ->component('azioni-roles')
                ->attributes(fn ($value, $row, Column $column) => [
                    'value' => $value,
                ]),
        ];
    }
}
