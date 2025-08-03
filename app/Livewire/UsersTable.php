<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;

    #[Url(as : 'q', history: true)]
    public $search = "";

    #[Url(history: true)]
    public $admin = "";

    #[Url()]
    public $perPage = 5;


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function destroy(User $user){
        $user->delete();
    }

    public function render()
    {
        $users = User::search($this->search)
        ->when($this->admin !== "", function($query){
            $query->where("role", $this->admin);
        })
        ->paginate($this->perPage);
        return view('livewire.users-table', [
            "users" => $users
        ]);
    }
}