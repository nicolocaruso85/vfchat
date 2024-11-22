@if ($action)
    <div class="ml-4">
        <button class="btn btn-flex flex-center btn-success w-40px w-md-auto h-40px px-0 px-md-6" wire:click="$dispatch('openModal', { component: '{{ $modal }}' })">
            <span>
                @if ($action == 'promo')
                    {{ __('Nuova :action', ['action' => $action]) }}
                @elseif($action == 'promo aziendale')
                    {{ __('Nuova :action', ['action' => $action]) }}
                @else
                    {{ __('Nuovo :action', ['action' => $action]) }}
                @endif
            </span>
        </button>
    </div>
@endif
