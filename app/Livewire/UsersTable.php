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

    #[Url(as : 'a', history: true)]
    public $admin = "";

    #[Url(as : 'so', history: true)]
    public $sortedOrder = "DESC";

    #[Url(as : 'sb', history: true)]
    public $sortedBy = "created_at";

     #[Url()]
    public $perPage = 5;

    public function sort($title){
        $this->sortedOrder == "DESC" ? $this->sortedOrder = "ASC" : $this->sortedOrder = "DESC";
        $this->sortedBy  = $title;
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function destroy(User $user){
        $user->delete();
    }

    public function render()
    {
        $users = User::orderBy($this->sortedBy, $this->sortedOrder)
        ->search($this->search)
        ->when($this->admin !== "", function($query){
            $query->where("role", $this->admin);
        })
        ->paginate($this->perPage);
        return view('livewire.users-table', [
            "users" => $users
        ]);
    }
}