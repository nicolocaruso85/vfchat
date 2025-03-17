<?php

namespace App\Livewire;

use App\Models\Gruppo;
use App\Models\Negozio;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Role;

class PermessiRuoloAzienda extends ModalComponent
{
    public $id_azienda;
    public $id_ruolo;

    public $ruolo;

    public $ruoli = [];
    public $gruppi = [];
    public $negozi = [];

    public $operazioni_aziende;
    public $operazioni_ruoli;
    public $operazioni_utenti;
    public $operazioni_quiz;

    public $permessi_ruoli = [];
    public $permessi_gruppi = [];
    public $permessi_negozi = [];

    public function mount()
    {
        $this->ruolo = Role::find($this->id_ruolo);

        $this->gruppi = Gruppo::where('owner_id', $this->id_azienda)->get();
        $this->negozi = Negozio::where('id_azienda', $this->id_azienda)->get();
        $this->ruoli = Role::where('team_id', $this->id_azienda)->get();

        foreach ($this->gruppi as $gruppo) {
            $this->permessi_gruppi[$gruppo->id] = [
                'messaggi' => $this->ruolo->hasPermissionTo('gruppo.' . $gruppo->id . '.messaggi'),
                'immagini' => $this->ruolo->hasPermissionTo('gruppo.' . $gruppo->id . '.immagini'),
                'file' => $this->ruolo->hasPermissionTo('gruppo.' . $gruppo->id . '.file'),
                'tutti' => $this->ruolo->hasAllPermissions(['gruppo.' . $gruppo->id . '.messaggi', 'gruppo.' . $gruppo->id . '.immagini', 'gruppo.' . $gruppo->id . '.file']),
            ];
        }

        foreach ($this->negozi as $negozio) {
            $this->permessi_negozi[$negozio->id] = [
                'messaggi' => $this->ruolo->hasPermissionTo('negozio.' . $negozio->id . '.messaggi'),
                'immagini' => $this->ruolo->hasPermissionTo('negozio.' . $negozio->id . '.immagini'),
                'file' => $this->ruolo->hasPermissionTo('negozio.' . $negozio->id . '.file'),
                'tutti' => $this->ruolo->hasAllPermissions(['negozio.' . $negozio->id . '.messaggi', 'negozio.' . $negozio->id . '.immagini', 'negozio.' . $negozio->id . '.file']),
            ];
        }

        foreach ($this->ruoli as $ruolo) {
            $this->permessi_ruoli[$ruolo->id] = [
                'messaggi' => $this->ruolo->hasPermissionTo('ruolo.' . $ruolo->id . '.messaggi'),
                'immagini' => $this->ruolo->hasPermissionTo('ruolo.' . $ruolo->id . '.immagini'),
                'file' => $this->ruolo->hasPermissionTo('ruolo.' . $ruolo->id . '.file'),
                'tutti' => $this->ruolo->hasAllPermissions(['ruolo.' . $ruolo->id . '.messaggi', 'ruolo.' . $ruolo->id . '.immagini', 'ruolo.' . $ruolo->id . '.file']),
            ];
        }

        $this->operazioni_aziende = [
            'create' => $this->ruolo->hasPermissionTo('aziende.create'),
            'update' => $this->ruolo->hasPermissionTo('aziende.update'),
            'delete' => $this->ruolo->hasPermissionTo('aziende.delete'),
            'tutti' => $this->ruolo->hasAllPermissions(['aziende.create', 'aziende.update', 'aziende.delete']),
        ];

        $this->operazioni_ruoli = [
            'create' => $this->ruolo->hasPermissionTo('ruoli.create'),
            'update' => $this->ruolo->hasPermissionTo('ruoli.update'),
            'delete' => $this->ruolo->hasPermissionTo('ruoli.delete'),
            'tutti' => $this->ruolo->hasAllPermissions(['ruoli.create', 'ruoli.update', 'ruoli.delete']),
        ];

        $this->operazioni_utenti = [
            'create' => $this->ruolo->hasPermissionTo('utenti.create'),
            'update' => $this->ruolo->hasPermissionTo('utenti.update'),
            'delete' => $this->ruolo->hasPermissionTo('utenti.delete'),
            'tutti' => $this->ruolo->hasAllPermissions(['utenti.create', 'utenti.update', 'utenti.delete']),
        ];

        $this->operazioni_quiz = [
            'create' => $this->ruolo->hasPermissionTo('quiz.create'),
            'update' => $this->ruolo->hasPermissionTo('quiz.update'),
            'delete' => $this->ruolo->hasPermissionTo('quiz.delete'),
            'tutti' => $this->ruolo->hasAllPermissions(['quiz.create', 'quiz.update', 'quiz.delete']),
        ];
    }

    public function salva()
    {
        $permissions = [];

        if ($this->operazioni_aziende['create']) {
            $permissions[] = 'aziende.create';
        }
        if ($this->operazioni_aziende['update']) {
            $permissions[] = 'aziende.update';
        }
        if ($this->operazioni_aziende['delete']) {
            $permissions[] = 'aziende.delete';
        }

        if ($this->operazioni_ruoli['create']) {
            $permissions[] = 'ruoli.create';
        }
        if ($this->operazioni_ruoli['update']) {
            $permissions[] = 'ruoli.update';
        }
        if ($this->operazioni_ruoli['delete']) {
            $permissions[] = 'ruoli.delete';
        }

        if ($this->operazioni_utenti['create']) {
            $permissions[] = 'utenti.create';
        }
        if ($this->operazioni_utenti['update']) {
            $permissions[] = 'utenti.update';
        }
        if ($this->operazioni_utenti['delete']) {
            $permissions[] = 'utenti.delete';
        }

        if ($this->operazioni_quiz['create']) {
            $permissions[] = 'quiz.create';
        }
        if ($this->operazioni_quiz['update']) {
            $permissions[] = 'quiz.update';
        }
        if ($this->operazioni_quiz['delete']) {
            $permissions[] = 'quiz.delete';
        }

        foreach ($this->gruppi as $gruppo) {
            if ($this->permessi_gruppi[$gruppo->id]['messaggi']) {
                $permissions[] = 'gruppo.' . $gruppo->id . '.messaggi';
            }
            if ($this->permessi_gruppi[$gruppo->id]['immagini']) {
                $permissions[] = 'gruppo.' . $gruppo->id . '.immagini';
            }
            if ($this->permessi_gruppi[$gruppo->id]['file']) {
                $permissions[] = 'gruppo.' . $gruppo->id . '.file';
            }
        }

        foreach ($this->negozi as $negozio) {
            if ($this->permessi_negozi[$negozio->id]['messaggi']) {
                $permissions[] = 'negozio.' . $negozio->id . '.messaggi';
            }
            if ($this->permessi_negozi[$negozio->id]['immagini']) {
                $permissions[] = 'negozio.' . $negozio->id . '.immagini';
            }
            if ($this->permessi_negozi[$negozio->id]['file']) {
                $permissions[] = 'negozio.' . $negozio->id . '.file';
            }
        }

        foreach ($this->ruoli as $ruolo) {
            if ($this->permessi_ruoli[$ruolo->id]['messaggi']) {
                $permissions[] = 'ruolo.' . $ruolo->id . '.messaggi';
            }
            if ($this->permessi_ruoli[$ruolo->id]['immagini']) {
                $permissions[] = 'ruolo.' . $ruolo->id . '.immagini';
            }
            if ($this->permessi_ruoli[$ruolo->id]['file']) {
                $permissions[] = 'ruolo.' . $ruolo->id . '.file';
            }
        }

        $this->ruolo->syncPermissions($permissions);

        $this->closeModal();
    }

    public function updatedOperazioniAziende($value, $key)
    {
        if ($key == 'tutti') {
            if ($this->operazioni_aziende['tutti']) {
                $this->operazioni_aziende['create'] = true;
                $this->operazioni_aziende['update'] = true;
                $this->operazioni_aziende['delete'] = true;
            }
            else {
                $this->operazioni_aziende['create'] = false;
                $this->operazioni_aziende['update'] = false;
                $this->operazioni_aziende['delete'] = false;
            }
        }
        else {
            if ($this->operazioni_aziende['create'] && $this->operazioni_aziende['update'] && $this->operazioni_aziende['delete']) {
                $this->operazioni_aziende['tutti'] = true;
            }
            elseif (!$this->operazioni_aziende['create'] || !$this->operazioni_aziende['update'] || !$this->operazioni_aziende['delete']) {
                $this->operazioni_aziende['tutti'] = false;
            }
        }
    }

    public function updatedOperazioniRuoli($value, $key)
    {
        if ($key == 'tutti') {
            if ($this->operazioni_ruoli['tutti']) {
                $this->operazioni_ruoli['create'] = true;
                $this->operazioni_ruoli['update'] = true;
                $this->operazioni_ruoli['delete'] = true;
            }
            else {
                $this->operazioni_ruoli['create'] = false;
                $this->operazioni_ruoli['update'] = false;
                $this->operazioni_ruoli['delete'] = false;
            }
        }
        else {
            if ($this->operazioni_ruoli['create'] && $this->operazioni_ruoli['update'] && $this->operazioni_ruoli['delete']) {
                $this->operazioni_ruoli['tutti'] = true;
            }
            elseif (!$this->operazioni_ruoli['create'] || !$this->operazioni_ruoli['update'] || !$this->operazioni_ruoli['delete']) {
                $this->operazioni_ruoli['tutti'] = false;
            }
        }
    }

    public function updatedOperazioniUtenti($value, $key)
    {
        if ($key == 'tutti') {
            if ($this->operazioni_utenti['tutti']) {
                $this->operazioni_utenti['create'] = true;
                $this->operazioni_utenti['update'] = true;
                $this->operazioni_utenti['delete'] = true;
            }
            else {
                $this->operazioni_utenti['create'] = false;
                $this->operazioni_utenti['update'] = false;
                $this->operazioni_utenti['delete'] = false;
            }
        }
        else {
            if ($this->operazioni_utenti['create'] && $this->operazioni_utenti['update'] && $this->operazioni_utenti['delete']) {
                $this->operazioni_utenti['tutti'] = true;
            }
            elseif (!$this->operazioni_utenti['create'] || !$this->operazioni_utenti['update'] || !$this->operazioni_utenti['delete']) {
                $this->operazioni_utenti['tutti'] = false;
            }
        }
    }

    public function updatedOperazioniQuiz($value, $key)
    {
        if ($key == 'tutti') {
            if ($this->operazioni_quiz['tutti']) {
                $this->operazioni_quiz['create'] = true;
                $this->operazioni_quiz['update'] = true;
                $this->operazioni_quiz['delete'] = true;
            }
            else {
                $this->operazioni_quiz['create'] = false;
                $this->operazioni_quiz['update'] = false;
                $this->operazioni_quiz['delete'] = false;
            }
        }
        else {
            if ($this->operazioni_quiz['create'] && $this->operazioni_quiz['update'] && $this->operazioni_quiz['delete']) {
                $this->operazioni_quiz['tutti'] = true;
            }
            elseif (!$this->operazioni_quiz['create'] || !$this->operazioni_quiz['update'] || !$this->operazioni_quiz['delete']) {
                $this->operazioni_quiz['tutti'] = false;
            }
        }
    }

    public function updatedPermessiRuoli($value, $key)
    {
        list($id, $op) = explode('.', $key);

        if ($op == 'tutti') {
            if ($this->permessi_ruoli[$id]['tutti']) {
                $this->permessi_ruoli[$id]['messaggi'] = true;
                $this->permessi_ruoli[$id]['immagini'] = true;
                $this->permessi_ruoli[$id]['file'] = true;
            }
            else {
                $this->permessi_ruoli[$id]['messaggi'] = false;
                $this->permessi_ruoli[$id]['immagini'] = false;
                $this->permessi_ruoli[$id]['file'] = false;
            }
        }
        else {
            if ($this->permessi_ruoli[$id]['messaggi'] && $this->permessi_ruoli[$id]['immagini'] && $this->permessi_ruoli[$id]['file']) {
                $this->permessi_ruoli[$id]['tutti'] = true;
            }
            elseif (!$this->permessi_ruoli[$id]['messaggi'] || !$this->permessi_ruoli[$id]['immagini'] || !$this->permessi_ruoli[$id]['file']) {
                $this->permessi_ruoli[$id]['tutti'] = false;
            }
        }
    }

    public function updatedPermessiGruppi($value, $key)
    {
        list($id, $op) = explode('.', $key);

        if ($op == 'tutti') {
            if ($this->permessi_gruppi[$id]['tutti']) {
                $this->permessi_gruppi[$id]['messaggi'] = true;
                $this->permessi_gruppi[$id]['immagini'] = true;
                $this->permessi_gruppi[$id]['file'] = true;
            }
            else {
                $this->permessi_gruppi[$id]['messaggi'] = false;
                $this->permessi_gruppi[$id]['immagini'] = false;
                $this->permessi_gruppi[$id]['file'] = false;
            }
        }
        else {
            if ($this->permessi_gruppi[$id]['messaggi'] && $this->permessi_gruppi[$id]['immagini'] && $this->permessi_gruppi[$id]['file']) {
                $this->permessi_gruppi[$id]['tutti'] = true;
            }
            elseif (!$this->permessi_gruppi[$id]['messaggi'] || !$this->permessi_gruppi[$id]['immagini'] || !$this->permessi_gruppi[$id]['file']) {
                $this->permessi_gruppi[$id]['tutti'] = false;
            }
        }
    }

    public function updatedPermessiNegozi($value, $key)
    {
        list($id, $op) = explode('.', $key);

        if ($op == 'tutti') {
            if ($this->permessi_negozi[$id]['tutti']) {
                $this->permessi_negozi[$id]['messaggi'] = true;
                $this->permessi_negozi[$id]['immagini'] = true;
                $this->permessi_negozi[$id]['file'] = true;
            }
            else {
                $this->permessi_negozi[$id]['messaggi'] = false;
                $this->permessi_negozi[$id]['immagini'] = false;
                $this->permessi_negozi[$id]['file'] = false;
            }
        }
        else {
            if ($this->permessi_negozi[$id]['messaggi'] && $this->permessi_negozi[$id]['immagini'] && $this->permessi_negozi[$id]['file']) {
                $this->permessi_negozi[$id]['tutti'] = true;
            }
            elseif (!$this->permessi_negozi[$id]['messaggi'] || !$this->permessi_negozi[$id]['immagini'] || !$this->permessi_negozi[$id]['file']) {
                $this->permessi_negozi[$id]['tutti'] = false;
            }
        }
    }

    public function render()
    {
        return view('livewire.permessi-ruolo-azienda');
    }

    public function cancel()
    {
        $this->closeModal();
    }

    public static function modalMaxWidth(): string
    {
        return '5xl';
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
