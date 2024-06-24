<?php

namespace App\Livewire\Island;

use Livewire\Component;
use Livewire\Attributes\On;

use App\Models\Island;

class IslandDeleteModal extends Component
{
	public $selectedIslandId = null;

	public function render()
	{
		return view('livewire.island.island-delete-modal');
	}

	#[On('delete-island')]
	public function deleteIsland($islandId)
	{
		$this->selectedIslandId = $islandId;
		$this->dispatch('open-modal', 'confirm-island-deletion');
	}

	public function destroy()
	{
		Island::destroy($this->selectedIslandId);
		$this->dispatch('close-modal', 'confirm-island-deletion');
		$this->dispatch('refresh-parent');
	}
}
