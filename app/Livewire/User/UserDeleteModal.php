<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\Attributes\On;

use App\Models\User;

class UserDeleteModal extends Component
{

	public $selectedUserId = null;
	public $show = false;

	public function render()
	{
		return view('livewire.user.user-delete-modal');
	}

	#[On('delete-user')]
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
