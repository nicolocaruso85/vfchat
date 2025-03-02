<?php

namespace App\Livewire;

use App\Models\Azienda;
use App\Traits\AuthorizesRoleOrPermission;
use Illuminate\Support\Facades\Auth;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;

class AziendeTable extends DataTableComponent
{
    use AuthorizesRoleOrPermission;

    protected $model = Azienda::class;

    public $action = 'azienda';

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setPerPageVisibilityStatus(false);
        $this->setColumnSelectStatus(false);
        $this->setPerPage(10);

        $this->setDefaultSort('nome');

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

        $this->setSearchPlaceholder('Cerca tra le Aziende');
        $this->setEmptyMessage('Nessuna azienda trovata, prova a cambiare la tua ricerca');

        $this->setConfigurableAreas([
            'toolbar-right-start' => [
                'partials.button.new', [
                    'modal'  => 'aggiungi-azienda',
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

            Column::make('Nome', 'nome')
                ->searchable()
                ->sortable(),

            ComponentColumn::make('Azioni', 'id')
                ->component('azioni-aziende')
                ->attributes(fn ($value, $row, Column $column) => [
                    'value' => $value,
                ]),
        ];
    }
}
