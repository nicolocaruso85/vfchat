<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Role;

class ModificaUtente extends ModalComponent
{
    use WithFileUploads;

    public $user;

    public $name;
    public $email;
    public $password;
    public $confirm_password;
    public $photo;
    public $ruoli;

    public $photo_url;

    public $roles = [];

    public function mount(User $user)
    {
        $this->user = $user;

        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = ($user->info) ? $user->info->phone : null;
        $this->via = ($user->info) ? $user->info->via : null;
        $this->citta = ($user->info) ? $user->info->citta : null;
        $this->provincia = ($user->info) ? $user->info->provincia : null;
        $this->ruoli = $user->roles->pluck('id')->all();

        if ($user->photo) {
            $this->photo_url = Storage::url('fotoutenti/' . $user->photo);
        }

        $this->roles = Role::all()->pluck('name', 'id')->toArray();
    }

    #[On('changeRuoli')]
    public function changeRuoli($data)
    {
        $this->ruoli = $data['data'];
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'nullable',
            'confirm_password' => 'nullable|same:password',
        ]);

        if ($this->password) {
            $validatedData['password'] = Hash::make($this->password);
        }
        else {
            unset($validatedData['password']);
        }

        if ($this->photo) {
            $validatedData['photo'] = $this->photo->store('/', 'fotoutenti');
        }

        $this->user->update($validatedData);

        $this->user->syncRoles(array_map('intval', $this->ruoli));

        $this->dispatch('refreshDatatable');

        $this->closeModal();
    }

    public function cancel()
    {
        $this->closeModal();
    }

    public function updatedPhoto()
    {
        $this->photo_url = $this->photo->temporaryUrl();
    }

    public function render()
    {
        return view('livewire.modifica-utente');
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }
}
