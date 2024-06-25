<?php

namespace App\Livewire\Island\Contact;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Contact;
use App\Models\Island;

class ContactList extends Component
{

	use WithPagination;

	public $search = null;

	public Island $island;

	protected $listeners = [
    'refresh-parent' => '$refresh'
  ];

	public function render()
	{

		$contacts = Contact::where('island_id', $this->island->id)
			->where('name', 'like', "%{$this->search}%")
			->paginate(5);

		return view('livewire.island.contact.contact-list', [
			'contacts' => $contacts
		]);
	}

}
