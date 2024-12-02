<div>
    <button class="btn btn-icon btn-light-danger btn-sm" title="Elimina" wire:click="$dispatch('openModal', { component: 'elimina-dipendente-ruolo', arguments: {{ json_encode(['id_ruolo' => $attributes['id_ruolo'], 'id_dipendente' => $attributes['value']]) }} })">
        <i class="bx bx-trash bx-md"></i>
    </button>
</div>
