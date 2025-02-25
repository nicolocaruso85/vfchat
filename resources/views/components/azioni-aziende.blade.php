<div>
    <a class="btn btn-icon text-info btn-sm mr-3" title="Visualizza" href="/azienda/{{ $attributes['value'] }}">
        <i class="bx bx-building bx-md"></i>
    </a>

    <button class="btn btn-icon text-primary btn-sm mr-3" title="Modifica" wire:click="$dispatch('openModal', { component: 'modifica-azienda', arguments: {{ json_encode(['azienda_id' => $attributes['value']]) }} })">
        <i class="bx bx-edit bx-md"></i>
    </button>

    <button class="btn btn-icon text-danger btn-sm" title="Elimina" wire:click="$dispatch('openModal', { component: 'elimina-azienda', arguments: {{ json_encode(['azienda_id' => $attributes['value']]) }} })">
        <i class="bx bx-trash bx-md"></i>
    </button>
</div>
