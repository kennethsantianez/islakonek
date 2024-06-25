<?php

namespace App\Livewire\Island\Contact;

use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

use App\Models\Contact;
use App\Models\Island;

class Modal extends Component
{

	public $islandId = '';
	public $selectedContactId = '';
	public $selectedContact = '';

	#[Validate('required|string')]
	public $name = '';

	public function render()
	{
		return view('livewire.island.contact.modal');
	}

	#[On('add-contact')]
	public function add($islandId)
	{
		$this->islandId = $islandId;
		$this->dispatch('open-modal', 'create-contact');
	}

	#[On('edit-contact')]
	public function edit($contactId)
	{
		$this->selectedContact = Contact::findOrFail($contactId);
		$this->selectedContactId = $contactId;

		$this->name = $this->selectedContact->name;
		
		$this->dispatch('open-modal', 'edit-contact');
	}

	#[On('delete-contact')]
	public function delete($contactId)
	{
		$this->selectedContactId = $contactId;
		$this->dispatch('open-modal', 'delete-contact');
	}

	public function store()
	{
		$this->validate();

		Island::findOrFail($this->islandId)->contacts()->create($this->only(['name']));

		$this->reset();

		$this->dispatch('close-modal', 'create-contact');
		$this->dispatch('refresh-parent');
	}

	public function update()
	{
		$this->validate();

		$this->selectedContact->update($this->only(['name']));
		$this->reset();

		$this->dispatch('close-modal', 'edit-contact');
		$this->dispatch('refresh-parent');
	}

	public function destroy()
	{
		Contact::destroy($this->selectedContactId);
		$this->dispatch('close-modal', 'delete-contact');
		$this->dispatch('refresh-parent');
	}

	public function close($modalName)
	{
		$this->reset();
		$this->dispatch('close-modal', $modalName);
	}

}
