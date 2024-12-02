<div>
    <x-simple-select
        name="azienda"
        id="azienda"
        :options="$aziende"
        value-field="id"
        text-field="nome"
        placeholder="Seleziona azienda"
        search-input-placeholder="Cerca"
        :searchable="true"
        wire:model.live="id_azienda"
    />

    @if ($id_azienda)
        <div class="accordion mt-4" id="accordion-ruoli">
            @foreach ($ruoli as $i => $ruolo)
                <div class="card accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-{{ $i }}" aria-expanded="false" aria-controls="accordionOne">
                            <span>{{ $ruolo->name }}</span>
                            <div class="badge bg-primary rounded-pill ms-4">
                                {{ $this->usersPerRuolo($ruolo->id) }}
                            </div>
                        </button>
                    </h2>

                    <div id="accordion-{{ $i }}" class="accordion-collapse collapsed collapse" data-bs-parent="#accordion-ruoli">
                        <div class="accordion-body">
                            @livewire('dipendenti-ruolo-table', ['id_azienda' => $id_azienda, 'id_ruolo' => $ruolo->id], key('dipendenti-ruolo-table-' . $ruolo->id . '-' . $id_azienda))
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
