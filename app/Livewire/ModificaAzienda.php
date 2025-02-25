<?php

namespace App\Livewire;

use App\Jobs\AggiornaAziendaToFirebase;
use App\Jobs\AggiornaUtenteToFirebase;
use App\Models\Azienda;
use App\Models\DipendentiAzienda;
use Livewire\Attributes\On;
use LivewireUI\Modal\ModalComponent;

class ModificaAzienda extends ModalComponent
{
    public $azienda_id;
    public $azienda;

    public $nome;
    public $telefono;
    public $indirizzo;
    public $citta;
    public $cap;

    public $dipendenti = [];
    public $amministratori = [];

    public function mount()
    {
        $this->azienda = Azienda::find($this->azienda_id);

        $this->nome = $this->azienda->nome;
        $this->telefono = $this->azienda->telefono;
        $this->indirizzo = $this->azienda->indirizzo;
        $this->citta = $this->azienda->citta;
        $this->cap = $this->azienda->cap;

        $this->dipendenti = $this->azienda->dipendenti->pluck('name', 'id')->toArray();

        $this->amministratori = $this->azienda->amministratori->pluck('id')->toArray();
    }

    public function render()
    {
        return view('livewire.modifica-azienda');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'nome' => 'required',
            'telefono' => '',
            'indirizzo' => '',
            'citta' => '',
            'cap' => '',
        ]);

        $this->azienda->update($validatedData);

        $this->dispatch('refreshDatatable');

        AggiornaAziendaToFirebase::dispatch($this->azienda->id);

        $amministratori = $this->azienda->amministratori->pluck('id')->toArray();

        foreach (array_diff($amministratori, $this->amministratori) as $id_dipendente) {
            DipendentiAzienda::where('id_azienda', $this->azienda->id)
                ->where('id_dipendente', $id_dipendente)
                ->update([
                    'admin' => false,
                ]);

            AggiornaUtenteToFirebase::dispatch($id_dipendente, false);
        }

        foreach ($this->amministratori as $id_dipendente) {
            DipendentiAzienda::where('id_azienda', $this->azienda->id)
                ->where('id_dipendente', $id_dipendente)
                ->update([
                    'admin' => true,
                ]);

            AggiornaUtenteToFirebase::dispatch($id_dipendente, true);
        }

        $this->closeModal();
    }

    #[On('changeAmministratori')]
    public function changeAmministratori($data)
    {
        $this->amministratori = $data['data'];
    }

    public function cancel()
    {
        $this->closeModal();
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }

    public static function closeModalOnEscape(): bool
    {
        return false;
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }
}
