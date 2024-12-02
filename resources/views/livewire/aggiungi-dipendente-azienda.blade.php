<div class="p-10">
    <div class="modal-header">
        <h5 class="modal-title">{{ __('Associa Dipendenti') }}</h5>
        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" wire:click="cancel">
            <span class="svg-icon svg-icon-2x">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                </svg>
            </span>
        </div>
    </div>

    <div class="modal-body">
        @livewire('associa-dipendenti-azienda-table', ['id_azienda' => $id_azienda])
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-light" wire:click="cancel">{{ __('Chiudi') }}</button>
    </div>
</div>
