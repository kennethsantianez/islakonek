<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;

class UserDeleteModal extends Component
{

	public $selectedUserId = null;
	public $show = false;

  protected $listeners = [
    'deleteUser'
  ];

	public function render()
	{
		return view('livewire.user.user-delete-modal');
	}

	public function deleteUser($userId)
	{
		$this->selectedUserId = $userId;
		$this->show = true;
	}

	public function destroy()
	{
		User::destroy($this->selectedUserId);
		$this->show = false;
		$this->dispatch('refresh-parent');
	}

}
