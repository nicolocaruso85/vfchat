<div>
    <button class="btn btn-icon btn-light-primary btn-sm mr-3" title="Modifica" wire:click="$dispatch('openModal', { component: 'modifica-gruppo', arguments: {{ json_encode(['gruppo_id' => $attributes['value']]) }} })">
        <i class="bx bx-edit bx-md"></i>
    </button>

    <button class="btn btn-icon btn-light-danger btn-sm" title="Elimina" wire:click="$dispatch('openModal', { component: 'elimina-gruppo', arguments: {{ json_encode(['gruppo_id' => $attributes['value']]) }} })">
        <i class="bx bx-trash bx-md"></i>
    </button>
</div>