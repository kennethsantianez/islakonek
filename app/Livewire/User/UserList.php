<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

use App\Models\User;

class UserList extends Component
{

	use WithPagination;

	#[Url]
	public $search = null;

  protected $listeners = [
    'refresh-parent' => '$refresh'
  ];

	public function render()
	{
		$users = User::where('id', '!=', auth()->user()->id)
			->where('first_name', 'like', "%{$this->search}%")
			->paginate(5);

		return view('livewire.user.user-list', [
			'users' => $users
		]);
	}

}
