<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UsersTable extends Component
{
    public function render()
    {
        $users = User::paginate(5);
        return view('livewire.users-table', [
            "users" => $users
        ]);
    }
}
