<div>
    <a class="btn btn-icon text-primary btn-sm mr-3" title="Visualizza" href="/utente/{{ $attributes['value'] }}">
        <i class="bx bx-user bx-md"></i>
    </a>

    @if (!$attributes['active'])
        <button class="btn btn-icon text-success btn-sm mr-3" title="Approva" wire:click="$dispatch('openModal', { component: 'approva-dipendente-azienda', arguments: {{ json_encode(['id_azienda' => $attributes['id_azienda'], 'id_dipendente' => $attributes['value']]) }} })">
            <i class="bx bxs-user-check bx-md"></i>
        </button>
    @endif

    <button class="btn btn-icon text-danger btn-sm" title="Elimina" wire:click="$dispatch('openModal', { component: 'elimina-dipendente-azienda', arguments: {{ json_encode(['id_azienda' => $attributes['id_azienda'], 'id_dipendente' => $attributes['value']]) }} })">
        <i class="bx bx-trash bx-md"></i>
    </button>
</div>
