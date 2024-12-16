<?php

namespace App\Livewire;

use App\Models\Gruppo;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Role;

class PermessiRuoloAzienda extends ModalComponent
{
    public $id_azienda;
    public $id_ruolo;

    public $ruolo;

    public $ruoli = [];
    public $gruppi = [];

    public $operazioni_aziende;
    public $operazioni_ruoli;
    public $operazioni_utenti;
    public $operazioni_quiz;

    public $permessi_ruoli = [];
    public $permessi_gruppi = [];

    public function mount()
    {
        $this->ruolo = Role::find($this->id_ruolo);

        $this->gruppi = Gruppo::where('owner_id', $this->id_azienda)->get();
        $this->ruoli = Role::where('team_id', $this->id_azienda)->get();

        foreach ($this->gruppi as $gruppo) {
            $this->permessi_gruppi[$gruppo->id] = [
                'messaggi' => $this->ruolo->hasPermissionTo('gruppo.' . $gruppo->id . '.messaggi'),
                'immagini' => $this->ruolo->hasPermissionTo('gruppo.' . $gruppo->id . '.immagini'),
                'file' => $this->ruolo->hasPermissionTo('gruppo.' . $gruppo->id . '.file'),
                'tutti' => $this->ruolo->hasAllPermissions(['gruppo.' . $gruppo->id . '.messaggi', 'gruppo.' . $gruppo->id . '.immagini', 'gruppo.' . $gruppo->id . '.file']),
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
