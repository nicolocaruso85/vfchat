<div>
    <x-simple-select
        name="azienda"
        id="azienda"
        :options="$aziende"
        value-field="id"
        text-field="nome"
        placeholder="Seleziona azienda"
        search-input-placeholder="Cerca"
        no-result="Nessuna azienda trovata per la tua ricerca."
        :searchable="true"
        wire:model.live="id_azienda"
    />

    @if ($id_azienda)
        <h5 class="mb-0 mt-5">{{ __('Ruoli') }}</h5>
        <div class="accordion mt-4" id="accordion-ruoli">
            @foreach ($this->ruoli as $i => $ruolo)
                <div class="card accordion-item">
                    <h2 class="accordion-header">
                        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-ruolo-{{ $i }}" aria-expanded="false" aria-controls="accordionOne">
                            <span>{{ $ruolo->name }}</span>
                            <div class="badge bg-primary rounded-pill ms-4">
                                {{ $this->usersPerRuolo($ruolo->id) }}
                            </div>
                        </button>
                    </h2>

                    <div id="accordion-ruolo-{{ $i }}" class="accordion-collapse collapsed collapse" data-bs-parent="#accordion-ruoli">
                        <div class="accordion-body">
                            @livewire('dipendenti-ruolo-table', ['id_azienda' => $id_azienda, 'id_ruolo' => $ruolo->id], key('dipendenti-ruolo-table-' . $ruolo->id . '-' . $id_azienda))
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <h5 class="mb-0 mt-5">{{ __('Gruppi') }}</h5>
        <div class="accordion mt-4" id="accordion-gruppi">
            @forelse ($this->gruppi as $i => $gruppo)
                <div class="card accordion-item">
                    <h2 class="accordion-header">
                        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-gruppo-{{ $i }}" aria-expanded="false" aria-controls="accordionOne">
                            <span>{{ $gruppo->name }}</span>
                            <div class="badge bg-primary rounded-pill ms-4">
                                {{ $this->usersPerGruppo($gruppo->id) }}
                            </div>
                        </button>
                    </h2>

                    <div id="accordion-gruppo-{{ $i }}" class="accordion-collapse collapsed collapse" data-bs-parent="#accordion-gruppi">
                        <div class="accordion-body">
                            @livewire('dipendenti-gruppo-table', ['id_azienda' => $id_azienda, 'id_gruppo' => $gruppo->id], key('dipendenti-gruppo-table-' . $gruppo->id . '-' . $id_azienda))
                        </div>
                    </div>
                </div>
            @empty
                <div>{{ __('Non sono stati creati Gruppi per questa Azienda.') }}</div>
            @endforelse
        </div>

        <h5 class="mb-0 mt-5">{{ __('Punti vendita') }}</h5>
        <div class="accordion mt-4" id="accordion-gruppi">
            @forelse ($this->negozi as $i => $negozio)
                <div class="card accordion-item">
                    <h2 class="accordion-header">
                        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-negozio-{{ $i }}" aria-expanded="false" aria-controls="accordionOne">
                            <span>{{ $negozio->nome }}</span>
                            <div class="badge bg-primary rounded-pill ms-4">
                                {{ $this->usersPerNegozio($negozio->id) }}
                            </div>
                        </button>
                    </h2>

                    <div id="accordion-negozio-{{ $i }}" class="accordion-collapse collapsed collapse" data-bs-parent="#accordion-gruppi">
                        <div class="accordion-body">
                            @livewire('dipendenti-negozio-table', ['id_azienda' => $id_azienda, 'id_negozio' => $negozio->id], key('dipendenti-negozio-table-' . $negozio->id . '-' . $id_azienda))
                        </div>
                    </div>
                </div>
            @empty
                <div>{{ __('Non sono stati creati Punti vendita per questa Azienda.') }}</div>
            @endforelse
        </div>
    @endif
</div>
