@if ($action)
    <div class="ml-4">
        <button class="btn btn-secondary add-new btn-primary ms-2" wire:click="$dispatch('openModal', { component: '{{ $modal }}' })">
            <span>
                <i class="bx bx-plus bx-sm me-0 me-sm-2"></i>
                <span class="d-none d-sm-inline-block">
                    @if ($action == 'azienda')
                        {{ __('Nuova :action', ['action' => $action]) }}
                    @elseif ($action == 'dipendente-azienda')
                        {{ __('Associa dipendenti') }}
                    @elseif ($action == 'dipendente-ruolo')
                        {{ __('Aggiungi dipendenti') }}
                    @else
                        {{ __('Nuovo :action', ['action' => $action]) }}
                    @endif
                </span>
            </span>
        </button>
    </div>
@endif
