<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\Attributes\On;

use App\Models\User;

class UserDeleteModal extends Component
{

	public $selectedUserId = null;

	public function render()
	{
		return view('livewire.user.user-delete-modal');
	}

	#[On('delete-user')]
	public function deleteUser($userId)
	{
		$this->selectedUserId = $userId;
		$this->dispatch('open-modal', 'confirm-user-deletion');
	}

	public function destroy()
	{
		User::destroy($this->selectedUserId);
		$this->dispatch('close-modal', 'confirm-user-deletion');
		$this->dispatch('refresh-parent');
	}

}
