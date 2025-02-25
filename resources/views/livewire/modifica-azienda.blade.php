<div>
    <div class="modal-header p-6">
        <h5 class="modal-title">{{ __('Modifica Azienda') }}</h5>
        <div class="btn btn-icon btn-sm btn-active-light-primary btn-close" wire:click="cancel">
            <span class="svg-icon svg-icon-2x">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                </svg>
            </span>
        </div>
    </div>

    <div class="modal-body px-6">
        <form id="modifica-azienda-form" wire:submit="update">
            <div class="fw-row mb-5">
                <label class="form-label fs-6 fw-bolder text-dark required">{{ __('Nome') }}</label>
                <input type="text" class="form-control form-control-md" wire:model.live="nome" required>
            </div>
            <div class="fw-row mb-5">
                <label class="form-label fs-6 fw-bolder text-dark required">{{ __('Telefono') }}</label>
                <input type="text" class="form-control form-control-md" wire:model="telefono">
            </div>
            <div class="fw-row mb-5">
                <label class="form-label fs-6 fw-bolder text-dark required">{{ __('Indirizzo') }}</label>
                <input type="text" class="form-control form-control-md" wire:model="indirizzo">
            </div>
            <div class="fw-row mb-5">
                <div class="row">
                    <div class="col-md-8">
                        <label class="form-label fs-6 fw-bolder text-dark required">{{ __('Città') }}</label>
                        <input type="text" class="form-control form-control-md" wire:model="citta">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fs-6 fw-bolder text-dark required">{{ __('CAP') }}</label>
                        <input type="text" class="form-control form-control-md" wire:model="cap">
                    </div>
                </div>
            </div>
            <div class="fw-row mb-5">
                <label class="form-label fs-6 fw-bolder text-dark required">{{ __('Amministratori') }}</label>
                <livewire:select-2 :options="$this->dipendenti" name="amministratori" :model="$this->amministratori" onchange="changeAmministratori" multiple/>
            </div>
        </form>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-light me-3" wire:click="cancel">{{ __('Chiudi') }}</button>
        <button type="submit" form="modifica-azienda-form" class="btn btn-primary">{{ __('Salva') }}</button>
    </div>
</div>
