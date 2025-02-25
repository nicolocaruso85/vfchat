<div>
    <button class="btn btn-icon text-primary btn-sm mr-3" title="Modifica" wire:click="$dispatch('openModal', { component: 'modifica-permission', arguments: {{ json_encode(['permission_id' => $attributes['value']]) }} })">
        <i class="bx bx-edit bx-md"></i>
    </button>

    <button class="btn btn-icon text-danger btn-sm" title="Elimina" wire:click="$dispatch('openModal', { component: 'elimina-permesso', arguments: {{ json_encode(['permission_id' => $attributes['value']]) }} })">
        <i class="bx bx-trash bx-md"></i>
    </button>
</div>
