<?php

namespace App\Livewire;

use App\Jobs\InviaUtenteToFirebase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Role;

class AggiungiUtente extends ModalComponent
{
    use WithFileUploads;

    public $name;
    public $email;
    public $password;
    public $confirm_password;
    public $photo;
    public $ruoli = [];

    public $photo_url;

    public $roles = [];

    public function mount()
    {
        $this->roles = Role::all()->pluck('name', 'id')->toArray();
    }

    #[On('changeRuoli')]
    public function changeRuoli($data)
    {
        $this->ruoli = $data['data'];
    }

    public function create()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        $validatedData['password'] = Hash::make($this->password);

        if ($this->photo) {
            $validatedData['photo'] = $this->photo->store('/', 'fotoutenti');
        }

        $user = User::create($validatedData);

        $user->syncRoles(array_map('intval', $this->ruoli));

        $this->dispatch('refreshDatatable');

        InviaUtenteToFirebase::dispatch($user->id, $this->password);

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
        return view('livewire.aggiungi-utente');
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }
}
