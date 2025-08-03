<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;

    public $search;

    public $perPage = 5;

    public function destroy(User $user){
        $user->delete();
    }

    public function render()
    {
        $users = User::where("name", "like", "%". $this->search. "%")
        ->orWhere("email", "like", "%". $this->search. "%")
        ->paginate($this->perPage);
        return view('livewire.users-table', [
            "users" => $users
        ]);
    }
}
