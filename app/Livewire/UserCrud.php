<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserCrud extends Component
{
    use WithPagination;

    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $user_id;
    public $is_admin = false;
    public $isOpen = 0;
    public $userToDeleteId = null;
    public $userToDeleteName = '';

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
        $this->dispatch('open-modal');
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->dispatch('close-modal');
    }

    private function resetInputFields(){
        $this->user_id = null;
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->is_admin = false;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->user_id,
            'password' => $this->user_id ? 'nullable|min:6|confirmed' : 'required|min:6|confirmed',
        ]);

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'is_admin' => (bool) $this->is_admin,
        ];

        if (!empty($this->password)) {
            $data['password'] = bcrypt($this->password);
        }

        User::updateOrCreate(['id' => $this->user_id], $data);

        session()->flash('message', 
            $this->user_id ? 'User updated successfully.' : 'User created successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->is_admin = (bool) $user->is_admin;

        $this->dispatch('open-modal');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $this->userToDeleteId = $user->id;
        $this->userToDeleteName = $user->name;
        $this->dispatch('open-delete-modal');
    }

    public function destroyUser()
    {
        if ($this->userToDeleteId == auth()->id()) {
            session()->flash('error', 'You cannot delete your own account.');
            $this->dispatch('close-delete-modal');
            return;
        }

        User::find($this->userToDeleteId)->delete();
        session()->flash('message', 'User deleted successfully.');
        $this->dispatch('close-delete-modal');
    }

    public function render()
    {
        return view('livewire.user-crud', [
            'users' => User::latest()->paginate(5)
        ]);
    }
}
