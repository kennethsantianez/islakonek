<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\User;

class UserList extends Component
{

	use WithPagination;

  protected $listeners = [
    'refresh-parent' => '$refresh'
  ];

	public function render()
	{
		$users = User::where('id', '!=', auth()->user()->id)->paginate(5);

		return view('livewire.user.user-list', [
			'users' => $users
		]);
	}

}
