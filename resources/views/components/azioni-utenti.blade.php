<div>
    <a class="btn btn-icon btn-light-primary btn-sm mr-3" title="Visualizza" href="/utente/{{ $attributes['value'] }}">
        <i class="bx bx-user bx-md"></i>
    </a>

    <button class="btn btn-icon btn-light-primary btn-sm mr-3" title="Modifica" wire:click="$dispatch('openModal', { component: 'modifica-utente', arguments: {{ json_encode(['user' => $attributes['value']]) }} })">
        <i class="bx bx-edit bx-md"></i>
    </button>
         
    <button class="btn btn-icon btn-light-danger btn-sm" title="Elimina" wire:click="$dispatch('openModal', { component: 'elimina-utente', arguments: {{ json_encode(['user_id' => $attributes['value']]) }} })">
        <i class="bx bx-trash bx-md"></i>
    </button>
</div>
