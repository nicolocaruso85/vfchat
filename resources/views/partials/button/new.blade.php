@if ($action)
    <div class="ml-4">
        @if ($action == 'dipendente-azienda')
            <button class="btn btn-secondary add-new btn-primary ms-2" wire:click="$dispatch('openModal', { component: '{{ $modal }}', arguments: {{ json_encode(['id_azienda' => $id_azienda]) }} })">
                <span>
                    <i class="bx bx-plus bx-sm me-0 me-sm-2"></i>
                    <span class="d-none d-sm-inline-block">
                        {{ __('Associa dipendenti') }}
                    </span>
                </span>
            </button>
        @elseif ($action == 'dipendente-ruolo')
            <button class="btn btn-secondary add-new btn-primary ms-2" wire:click="$dispatch('openModal', { component: '{{ $modal }}', arguments: {{ json_encode(['id_azienda' => $id_azienda, 'id_ruolo' => $id_ruolo]) }} })">
                <span>
                    <i class="bx bx-plus bx-sm me-0 me-sm-2"></i>
                    <span class="d-none d-sm-inline-block">
                        {{ __('Aggiungi dipendenti') }}
                    </span>
                </span>
            </button>
        @else
            <button class="btn btn-secondary add-new btn-primary ms-2" wire:click="$dispatch('openModal', { component: '{{ $modal }}' })">
                <span>
                    <i class="bx bx-plus bx-sm me-0 me-sm-2"></i>
                    <span class="d-none d-sm-inline-block">
                        @if ($action == 'azienda')
                            {{ __('Nuova :action', ['action' => $action]) }}
                        @else
                            {{ __('Nuovo :action', ['action' => $action]) }}
                        @endif
                    </span>
                </span>
            </button>
        @endif
    </div>
@endif
