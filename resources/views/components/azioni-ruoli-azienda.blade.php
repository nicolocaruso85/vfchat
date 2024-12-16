<div>
    <button class="btn btn-icon btn-light-danger btn-sm" title="Modifica i permessi" wire:click="$dispatch('openModal', { component: 'permessi-ruolo-azienda', arguments: {{ json_encode(['id_azienda' => $attributes['id_azienda'], 'id_ruolo' => $attributes['value']]) }} })">
        <i class="bx bx-lock-open bx-md"></i>
    </button>
</div>
