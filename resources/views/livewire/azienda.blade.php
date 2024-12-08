<div>
    <div class="d-flex flex-column flex-sm-row align-items-center justify-content-sm-between mb-6 text-center text-sm-start gap-2">
        <div class="mb-2 mb-sm-0">
            <h4 class="mb-1">
                {{ $azienda->nome }}
            </h4>
        </div>
        <button type="button" class="btn btn-danger">Elimina Azienda</button>
    </div>

    <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
            <div class="card mb-6">
                <div class="card-body pt-12">
                    <div class="customer-avatar-section">
                        <div class="customer-info text-center mb-6">
                            <h5 class="mb-0">{{ $azienda->nome }}</h5>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around flex-wrap mb-6 gap-0 gap-md-3 gap-lg-4">
                        <div class="d-flex align-items-center gap-4 me-5">
                            <div class="avatar">
                                <div class="avatar-initial rounded bg-label-primary">
                                    <i class="bx bx-user bx-lg"></i>
                                </div>
                            </div>
                            <div>
                                <h5 class="mb-0">{{ $this->dipendenti }}</h5>
                                <span>Dipendenti</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-4">
                            <div class="avatar">
                                <div class="avatar-initial rounded bg-label-primary">
                                    <i class="bx bxs-buildings bx-lg"></i>
                                </div>
                            </div>
                            <div>
                                <h5 class="mb-0">{{ $this->puntivendita }}</h5>
                                <span>Punti vendita</span>
                            </div>
                        </div>
                    </div>

                    <div class="info-container">
                        <h5 class="pb-4 border-bottom text-capitalize mt-6 mb-4">Info azienda</h5>
                        <ul class="list-unstyled mb-6">
                            <li class="mb-2">
                                <span class="h6 me-1">Telefono:</span>
                                <span>{{ $azienda->telefono }}</span>
                            </li>
                            <li class="mb-2">
                                <span class="h6 me-1">Indirizzo:</span>
                                <span>{{ $azienda->indirizzo }}</span>
                            </li>
                            <li class="mb-2">
                                <span class="h6 me-1">Citta:</span>
                                <span>{{ $azienda->citta }}</span>
                            </li>
                            <li class="mb-2">
                                <span class="h6 me-1">CAP:</span>
                                <span>{{ $azienda->cap }}</span>
                            </li>
                        </ul>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-primary w-100" wire:click="$dispatch('openModal', { component: 'modifica-azienda', arguments: {{ json_encode(['azienda_id' => $azienda->id]) }} })">Modifica Azienda</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
            <div class="nav-align-top">
                <ul class="nav nav-pills flex-column flex-md-row mb-6">
                    <li class="nav-item">
                        <a class="nav-link @if ($activeTab == 1) active @endif" wire:click="$set('activeTab', 1)">
                            <i class="bx bx-building bx-sm me-1_5"></i>Informazioni
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($activeTab == 2) active @endif" wire:click="$set('activeTab', 2)">
                            <i class="bx bx-user bx-sm me-1_5"></i>Dipendenti
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($activeTab == 3) active @endif" wire:click="$set('activeTab', 3)">
                            <i class="bx bxs-buildings bx-sm me-1_5"></i>Punti vendita
                        </a>
                    </li>
                </ul>
            </div>

            @if ($activeTab == 1)
                <div class="row text-nowrap">
                    <div class="col-md-6 mb-6">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="card-icon mb-2">
                                    <div class="avatar">
                                        <div class="avatar-initial rounded bg-label-primary"><i class="bx bx-dollar bx-lg"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-info">
                                    <h5 class="card-title mb-2">Test</h5>
                                    <div class="d-flex align-items-baseline gap-1">
                                        <h5 class="text-primary mb-0">123</h5>
                                        <p class="mb-0"> Test</p>
                                    </div>
                                    <p class="mb-0 text-truncate">Test</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-icon mb-2">
                                    <div class="avatar">
                                        <div class="avatar-initial rounded bg-label-success"><i class="bx bx-gift bx-lg"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-info">
                                    <h5 class="card-title mb-2">Test</h5>
                                    <div class="d-flex align-items-baseline gap-1">
                                        <h5 class="text-success mb-0">15</h5>
                                        <p class="mb-0">Test</p>
                                    </div>
                                    <p class="mb-0 text-truncate">Test</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-icon mb-2">
                                  <div class="avatar">
                                    <div class="avatar-initial rounded bg-label-warning"><i class="bx bx-star bx-lg"></i>
                                    </div>
                                  </div>
                                </div>
                                <div class="card-info">
                                    <h5 class="card-title mb-2">Test</h5>
                                    <div class="d-flex align-items-baseline gap-1">
                                        <h5 class="text-warning mb-0">15</h5>
                                        <p class="mb-0">Test</p>
                                    </div>
                                    <p class="mb-0 text-truncate">Test</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-icon mb-2">
                                    <div class="avatar">
                                        <div class="avatar-initial rounded bg-label-info"><i class="bx bx-crown bx-lg"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-info">
                                    <h5 class="card-title mb-2">Test</h5>
                                    <div class="d-flex align-items-baseline gap-1">
                                        <h5 class="text-info mb-0">21</h5>
                                        <p class="mb-0">Test</p>
                                    </div>

                                    <p class="mb-0 text-truncate">Test</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif ($activeTab == 2)
                <div>
                    @livewire('dipendenti-azienda-table', ['id_azienda' => $azienda->id])
                </div>
            @elseif ($activeTab == 3)
                <div>
                    @livewire('negozi-azienda-table', ['id_azienda' => $azienda->id])
                </div>
            @endif
        </div>
    </div>
</div>
