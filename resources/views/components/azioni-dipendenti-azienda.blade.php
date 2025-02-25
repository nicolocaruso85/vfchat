<div>
    <a class="btn btn-icon btn-light-primary btn-sm mr-3" title="Visualizza" href="/utente/{{ $attributes['value'] }}">
        <i class="bx bx-user bx-md"></i>
    </a>

    <button class="btn btn-icon btn-light-danger btn-sm" title="Elimina" wire:click="$dispatch('openModal', { component: 'elimina-dipendente-azienda', arguments: {{ json_encode(['id_azienda' => $attributes['id_azienda'], 'id_dipendente' => $attributes['value']]) }} })">
        <i class="bx bx-trash bx-md"></i>
    </button>
</div>
