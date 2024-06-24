<?php

namespace App\Livewire\Island;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

use App\Models\Island;

class IslandList extends Component
{
	use WithPagination;

	#[Url]
	public $search = null;

  protected $listeners = [
    'refresh-parent' => '$refresh'
  ];
	public function render()
	{
		$islands = Island::where('name', 'like', "%{$this->search}%")->paginate(5);

		return view('livewire.island.island-list', [
			'islands' => $islands
		]);
	}
}
