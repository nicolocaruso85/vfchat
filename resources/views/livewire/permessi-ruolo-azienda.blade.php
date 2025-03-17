<div>
    <div class="modal-header p-6">
        <h5 class="modal-title">{{ __('Permessi ruolo (:ruolo)', ['ruolo' => $ruolo->name]) }}</h5>
        <div class="btn btn-icon btn-sm btn-active-light-primary btn-close" wire:click="cancel">
            <span class="svg-icon svg-icon-2x">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                </svg>
            </span>
        </div>
    </div>

    <div class="modal-body px-6 pb-5">
        <h5 class="mb-0 mt-5">{{ __('Operazioni Globali') }}</h5>
        <table class="table">
            <thead>
                <th class="fw-bold text-gray-600 text-uppercase border-top-0">Operazione</th>
                <th class="fw-bold text-gray-600 text-uppercase text-center border-top-0">Crea</th>
                <th class="fw-bold text-gray-600 text-uppercase text-center border-top-0">Aggiorna</th>
                <th class="fw-bold text-gray-600 text-uppercase text-center border-top-0">Elimina</th>
                <th class="fw-bold text-gray-600 text-uppercase text-center border-top-0">Tutti</th>
            </thead>
            <tbody>
                <!--<tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white align-middle text-nowrap">
                        Aziende
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white align-middle text-nowrap">
                        <div class="form-check mb-0 d-flex justify-content-center fs-5">
                            <input class="form-check-input" type="checkbox" wire:model.live="operazioni_aziende.create">
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white align-middle text-nowrap">
                        <div class="form-check mb-0 d-flex justify-content-center fs-5">
                            <input class="form-check-input" type="checkbox" wire:model.live="operazioni_aziende.update">
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white align-middle text-nowrap">
                        <div class="form-check mb-0 d-flex justify-content-center fs-5">
                            <input class="form-check-input" type="checkbox" wire:model.live="operazioni_aziende.delete">
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white align-middle text-nowrap">
                        <div class="form-check mb-0 d-flex justify-content-center fs-5">
                            <input class="form-check-input" type="checkbox" wire:model.live="operazioni_aziende.tutti">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white align-middle text-nowrap">
                        Ruoli
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white align-middle text-nowrap">
                        <div class="form-check mb-0 d-flex justify-content-center fs-5">
                            <input class="form-check-input" type="checkbox" wire:model.live="operazioni_ruoli.create">
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white align-middle text-nowrap">
                        <div class="form-check mb-0 d-flex justify-content-center fs-5">
                            <input class="form-check-input" type="checkbox" wire:model.live="operazioni_ruoli.update">
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white align-middle text-nowrap">
                        <div class="form-check mb-0 d-flex justify-content-center fs-5">
                            <input class="form-check-input" type="checkbox" wire:model.live="operazioni_ruoli.delete">
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white align-middle text-nowrap">
                        <div class="form-check mb-0 d-flex justify-content-center fs-5">
                            <input class="form-check-input" type="checkbox" wire:model.live="operazioni_ruoli.tutti">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white align-middle text-nowrap">
                        Utenti
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white align-middle text-nowrap">
                        <div class="form-check mb-0 d-flex justify-content-center fs-5">
                            <input class="form-check-input" type="checkbox" wire:model.live="operazioni_utenti.create">
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white align-middle text-nowrap">
                        <div class="form-check mb-0 d-flex justify-content-center fs-5">
                            <input class="form-check-input" type="checkbox" wire:model.live="operazioni_utenti.update">
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white align-middle text-nowrap">
                        <div class="form-check mb-0 d-flex justify-content-center fs-5">
                            <input class="form-check-input" type="checkbox" wire:model.live="operazioni_utenti.delete">
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white align-middle text-nowrap">
                        <div class="form-check mb-0 d-flex justify-content-center fs-5">
                            <input class="form-check-input" type="checkbox" wire:model.live="operazioni_utenti.tutti">
                        </div>
                    </td>
                </tr>-->
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white align-middle text-nowrap">
                        Quiz
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white align-middle text-nowrap">
                        <div class="form-check mb-0 d-flex justify-content-center fs-5">
                            <input class="form-check-input" type="checkbox" wire:model.live="operazioni_quiz.create">
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white align-middle text-nowrap">
                        <div class="form-check mb-0 d-flex justify-content-center fs-5">
                            <input class="form-check-input" type="checkbox" wire:model.live="operazioni_quiz.update">
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white align-middle text-nowrap">
                        <div class="form-check mb-0 d-flex justify-content-center fs-5">
                            <input class="form-check-input" type="checkbox"  wire:model.live="operazioni_quiz.delete">
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white align-middle text-nowrap">
                        <div class="form-check mb-0 d-flex justify-content-center fs-5">
                            <input class="form-check-input" type="checkbox"  wire:model.live="operazioni_quiz.tutti">
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        <h5 class="mb-0 mt-5">{{ __('Operazioni sui Ruoli') }}</h5>
        <table class="table">
            <thead>
                <th class="fw-bold text-gray-600 text-uppercase border-top-0">Inviare</th>
                <th class="fw-bold text-gray-600 text-uppercase text-center border-top-0">Messaggi</th>
                <th class="fw-bold text-gray-600 text-uppercase text-center border-top-0">Immagini</th>
                <th class="fw-bold text-gray-600 text-uppercase text-center border-top-0">File</th>
                <th class="fw-bold text-gray-600 text-uppercase text-center border-top-0">Tutti</th>
            </thead>
            <tbody>
                @foreach ($ruoli as $ruolo)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white align-middle text-nowrap">
                            {{ $ruolo->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white align-middle text-nowrap">
                            <div class="form-check mb-0 d-flex justify-content-center fs-5">
                                <input class="form-check-input" type="checkbox" wire:model.live="permessi_ruoli.{{ $ruolo->id }}.messaggi">
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white align-middle text-nowrap">
                            <div class="form-check mb-0 d-flex justify-content-center fs-5">
                                <input class="form-check-input" type="checkbox" wire:model.live="permessi_ruoli.{{ $ruolo->id }}.immagini">
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white align-middle text-nowrap">
                            <div class="form-check mb-0 d-flex justify-content-center fs-5">
                                <input class="form-check-input" type="checkbox" wire:model.live="permessi_ruoli.{{ $ruolo->id }}.file">
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white align-middle text-nowrap">
                            <div class="form-check mb-0 d-flex justify-content-center fs-5">
                                <input class="form-check-input" type="checkbox" wire:model.live="permessi_ruoli.{{ $ruolo->id }}.tutti">
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h5 class="mb-0 mt-5">{{ __('Operazioni sui Gruppi') }}</h5>
        <table class="table">
            <thead>
                <th class="fw-bold text-gray-600 text-uppercase border-top-0">Inviare</th>
                <th class="fw-bold text-gray-600 text-uppercase text-center border-top-0">Messaggi</th>
                <th class="fw-bold text-gray-600 text-uppercase text-center border-top-0">Immagini</th>
                <th class="fw-bold text-gray-600 text-uppercase text-center border-top-0">File</th>
                <th class="fw-bold text-gray-600 text-uppercase text-center border-top-0">Tutti</th>
            </thead>
            <tbody>
                @foreach ($gruppi as $gruppo)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white align-middle text-nowrap">
                            {{ $gruppo->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white align-middle text-nowrap">
                            <div class="form-check mb-0 d-flex justify-content-center fs-5">
                                <input class="form-check-input" type="checkbox" wire:model.live="permessi_gruppi.{{ $gruppo->id }}.messaggi">
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white align-middle text-nowrap">
                            <div class="form-check mb-0 d-flex justify-content-center fs-5">
                                <input class="form-check-input" type="checkbox" wire:model.live="permessi_gruppi.{{ $gruppo->id }}.immagini">
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white align-middle text-nowrap">
                            <div class="form-check mb-0 d-flex justify-content-center fs-5">
                                <input class="form-check-input" type="checkbox" wire:model.live="permessi_gruppi.{{ $gruppo->id }}.file">
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white align-middle text-nowrap">
                            <div class="form-check mb-0 d-flex justify-content-center fs-5">
                                <input class="form-check-input" type="checkbox" wire:model.live="permessi_gruppi.{{ $gruppo->id }}.tutti">
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h5 class="mb-0 mt-5">{{ __('Operazioni sui Punti vendita') }}</h5>
        <table class="table">
            <thead>
                <th class="fw-bold text-gray-600 text-uppercase border-top-0">Inviare</th>
                <th class="fw-bold text-gray-600 text-uppercase text-center border-top-0">Messaggi</th>
                <th class="fw-bold text-gray-600 text-uppercase text-center border-top-0">Immagini</th>
                <th class="fw-bold text-gray-600 text-uppercase text-center border-top-0">File</th>
                <th class="fw-bold text-gray-600 text-uppercase text-center border-top-0">Tutti</th>
            </thead>
            <tbody>
                @foreach ($negozi as $negozio)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white align-middle text-nowrap">
                            {{ $negozio->nome }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white align-middle text-nowrap">
                            <div class="form-check mb-0 d-flex justify-content-center fs-5">
                                <input class="form-check-input" type="checkbox" wire:model.live="permessi_negozi.{{ $negozio->id }}.messaggi">
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white align-middle text-nowrap">
                            <div class="form-check mb-0 d-flex justify-content-center fs-5">
                                <input class="form-check-input" type="checkbox" wire:model.live="permessi_negozi.{{ $negozio->id }}.immagini">
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white align-middle text-nowrap">
                            <div class="form-check mb-0 d-flex justify-content-center fs-5">
                                <input class="form-check-input" type="checkbox" wire:model.live="permessi_negozi.{{ $negozio->id }}.file">
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white align-middle text-nowrap">
                            <div class="form-check mb-0 d-flex justify-content-center fs-5">
                                <input class="form-check-input" type="checkbox" wire:model.live="permessi_negozi.{{ $negozio->id }}.tutti">
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-light me-3" wire:click="cancel">{{ __('Chiudi') }}</button>
        <button type="button" class="btn btn-primary" wire:click="salva">{{ __('Salva') }}</button>
    </div>
</div>
