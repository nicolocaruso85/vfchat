<div>
    <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
            <div class="card mb-6">
                <div class="card-body pt-12">
                    <div class="customer-avatar-section">
                        <div class="d-flex align-items-center flex-column">
                            <img class="img-fluid rounded mb-4" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" height="120" width="120" alt="User avatar">

                            <div class="customer-info text-center mb-6">
                                <h5 class="mb-0">{{ $user->name }}</h5>
                            </div>
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
                                <h5 class="mb-0">4</h5>
                                <span>Test</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-4">
                            <div class="avatar">
                                <div class="avatar-initial rounded bg-label-primary">
                                    <i class="bx bx-signal-5 bx-lg"></i>
                                </div>
                            </div>
                            <div>
                                <h5 class="mb-0">119</h5>
                                <span>Punteggio</span>
                            </div>
                        </div>
                    </div>

                    <div class="info-container">
                        <h5 class="pb-4 border-bottom text-capitalize mt-6 mb-4">Info utente</h5>
                        <ul class="list-unstyled mb-6">
                            <li class="mb-2">
                                <span class="h6 me-1">Email:</span>
                                <span>{{ $user->email }}</span>
                            </li>

                            <li class="mb-2">
                                <span class="h6 me-1">Aziende:</span>
                                <span>
                                    @foreach ($this->aziende as $azienda)
                                        <span class="badge bg-label-info">
                                            {{ $azienda->nome }}
                                        </span>
                                    @endforeach
                                </span>
                            </li>

                            <li class="mb-2">
                                <span class="h6 me-1">Ruoli:</span>
                                <span>
                                    @foreach ($this->ruoli as $ruolo)
                                        <span class="badge bg-label-primary">
                                            {{ $ruolo }}
                                        </span>
                                    @endforeach
                                </span>
                            </li>

                            <li class="mb-2">
                                <span class="h6 me-1">Gruppi:</span>
                                <span>
                                    @foreach ($this->gruppi as $gruppo)
                                        <span class="badge bg-label-secondary">
                                            {{ $gruppo->name }}
                                        </span>
                                    @endforeach
                                </span>
                            </li>
                        </ul>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-primary w-100" wire:click="$dispatch('openModal', { component: 'modifica-utente', arguments: {{ json_encode(['user' => $user->id]) }} })">Modifica Utente</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
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
        </div>
    </div>
</div>
