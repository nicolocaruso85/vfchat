<?php

namespace App\Livewire;

use App\Models\Negozio;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;

class NegoziAziendaTable extends DataTableComponent
{
    public $id_azienda;

    public $action = 'negozio-azienda';

    public function builder(): Builder
    {
        return Negozio::where('id_azienda', $this->id_azienda);
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

        $this->setSearchPlaceholder('Cerca tra i Negozi');
        $this->setEmptyMessage('Nessun negozio trovato, prova a cambiare la tua ricerca');

        $this->setConfigurableAreas([
            'toolbar-right-start' => [
                'partials.button.new', [
                    'action' => $this->action,
                    'modal' => 'aggiungi-negozio',
                    'id_azienda' => $this->id_azienda,
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
                ->component('azioni-negozi-azienda')
                ->attributes(fn ($value, $row, Column $column) => [
                    'value' => $value,
                    'id_azienda' => $this->id_azienda,
                ]),
        ];
    }
}
