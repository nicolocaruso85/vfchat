<div>
    <button class="btn btn-icon text-danger btn-sm" title="Elimina" wire:click="$dispatch('openModal', { component: 'elimina-dipendente-negozio', arguments: {{ json_encode(['id_negozio' => $attributes['id_negozio'], 'id_dipendente' => $attributes['value']]) }} })">
        <i class="bx bx-trash bx-md"></i>
    </button>
</div>
