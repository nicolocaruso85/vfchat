<div class="p-10" wire:init="$dispatch('applySelect2')">
    <div class="modal-header">
        <h5 class="modal-title">{{ __('Nuovo Utente') }}</h5>

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
        <form id="aggiungi-utente-form" wire:submit="create">
            <div class="fw-row mb-5">
                <label class="form-label fs-6 fw-bolder text-dark required">{{ __('Nome') }}</label>
                <input type="text" class="form-control form-control-md" wire:model.live="name" required>
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="fw-row mb-5">
                <label class="form-label fs-6 fw-bolder text-dark required">{{ __('Email') }}</label>
                <input type="email" class="form-control form-control-md" wire:model.live="email" required>
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="fw-row mb-5">
                <label class="form-label fs-6 fw-bolder text-dark required">{{ __('Password') }}</label>
                <input type="password" class="form-control form-control-md" wire:model.live="password" required>
                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="fw-row mb-5">
                <label class="form-label fs-6 fw-bolder text-dark required">{{ __('Conferma Password') }}</label>
                <input type="password" class="form-control form-control-md" wire:model.live="confirm_password" required>
                @error('confirm_password') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="fw-row mb-5" wire:ignore>
                <label class="form-label fs-6 fw-bolder text-dark required">{{ __('Ruoli') }}</label>
                <select id="ruoli" class="form-select" wire:model.live="ruoli" multiple>
                    @foreach ($roles as $r)
                        <option value="{{ $r->id }}">{{ $r->name }}</option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-light" wire:click="cancel">{{ __('Chiudi') }}</button>
        <button type="submit" form="aggiungi-utente-form" class="btn btn-primary">{{ __('Salva') }}</button>
    </div>
</div>

@script
    <script>
        $wire.on('applySelect2', function() {
            setTimeout(function() {
                var el = $('#ruoli');
                el.off('change');
                initRuoliSelect();

                el.on('change', function (e) {
                    $wire.set('ruoli', el.select2('val'));
                });

                function initRuoliSelect() {
                    el.select2({
                        placeholder: '{{__('Seleziona i ruoli...')}}',
                        allowClear: !el.attr('required'),
                        dropdownParent: el.parent(),
                    });
                }
            }, 200);
        });
    </script>
@endscript
