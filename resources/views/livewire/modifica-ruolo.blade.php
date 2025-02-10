<div wire:init="$dispatch('applySelect2')">
    <div class="modal-header p-6">
        <h5 class="modal-title">{{ __('Modifica Ruolo') }}</h5>
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
        <form id="aggiungi-progetto-form" wire:submit="update">
            <div class="fw-row mb-5">
                <label class="form-label fs-6 fw-bolder text-dark required">{{ __('Nome del ruolo') }}</label>
                <input type="text" class="form-control form-control-md" wire:model.live="name" required>
            </div>
            <div class="fw-row mb-5">
                <label class="form-label fs-6 fw-bolder text-dark required">{{ __('Azienda') }}</label>

                <livewire:select-2 :options="$this->aziende" name="azienda" :model="$this->id_azienda" onchange="changeAzienda"/>
            </div>
            <div class="fw-row mb-5" wire:ignore>
                <label class="form-label fs-6 fw-bolder text-dark required">{{ __('Permessi del ruolo') }}</label>

                <livewire:select-2 :options="$this->permissions" name="permissions" :model="$this->sel_permission" onchange="changeSelPermissions" multiple/>
            </div>
        </form>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-light me-3" wire:click="cancel">{{ __('Chiudi') }}</button>
        <button type="submit" form="aggiungi-progetto-form" class="btn btn-primary">{{ __('Salva') }}</button>
    </div>
</div>
