<div>
    <button class="btn btn-icon btn-light-danger btn-sm" title="Elimina" wire:click="$dispatch('openModal', { component: 'elimina-dipendente-gruppo', arguments: {{ json_encode(['id_gruppo' => $attributes['id_gruppo'], 'id_dipendente' => $attributes['value']]) }} })">
        <i class="bx bx-trash bx-md"></i>
    </button>
</div>
