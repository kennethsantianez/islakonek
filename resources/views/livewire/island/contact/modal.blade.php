<div>

	{{-- create --}}
	<x-modal name="create-contact" maxWidth="sm" focusable>

		<div class="p-6">
			<div class="flex items-center justify-center">
				<svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-700 dark:text-gray-300" fill="none"
					viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
					<path stroke-linecap="round" stroke-linejoin="round"
						d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
				</svg>
			</div>

			<form wire:submit="store">

				<div class="mt-2 text-center">
					<h3 class="text-lg font-medium leading-6 text-gray-800 capitalize dark:text-white" id="modal-title">Add Contact</h3>

						<div>
							<x-input-label for="name" :value="__('Name')" />
							<x-text-input id="name" wire:model="name" type="text" class="mt-1 block w-full"
								:value="old('name')" autofocus />
							<x-input-error class="mt-2" :messages="$errors->get('name')" />
						</div>

				</div>

				<div class="mt-6 flex justify-end">
					<x-secondary-button wire:click="close('create-contact')">
						{{ __('No') }}
					</x-secondary-button>
		
					<x-primary-button class="ms-3">
						{{ __('Yes') }}
					</x-primary-button>
				</div>

			</form>

		</div>

	</x-modal>

	{{-- edit --}}
	<x-modal name="edit-contact" maxWidth="sm" focusable>

		<div class="p-6">
			<div class="flex items-center justify-center">
				<svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-700 dark:text-gray-300" fill="none"
					viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
					<path stroke-linecap="round" stroke-linejoin="round"
						d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
				</svg>
			</div>

			<form wire:submit="update">

				<div class="mt-2 text-center">
					<h3 class="text-lg font-medium leading-6 text-gray-800 capitalize dark:text-white" id="modal-title">Add Contact</h3>

						<div>
							<x-input-label for="name" :value="__('Name')" />
							<x-text-input id="name" wire:model="name" type="text" class="mt-1 block w-full"
								:value="old('name')" autofocus />
							<x-input-error class="mt-2" :messages="$errors->get('name')" />
						</div>

				</div>

				<div class="mt-6 flex justify-end">
					<x-secondary-button wire:click="close('edit-contact')">
						{{ __('No') }}
					</x-secondary-button>
		
					<x-primary-button class="ms-3">
						{{ __('Yes') }}
					</x-primary-button>
				</div>

			</form>

		</div>

	</x-modal>

	{{-- delete --}}
	<x-modal name="delete-contact" maxWidth="sm" focusable>

		<div class="p-6">
			<div class="flex items-center justify-center">
				<svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-700 dark:text-gray-300" fill="none"
					viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
					<path stroke-linecap="round" stroke-linejoin="round"
						d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
				</svg>
			</div>

			<div class="mt-2 text-center">
				<h3 class="text-lg font-medium leading-6 text-gray-800 capitalize dark:text-white" id="modal-title">Delete
					Confirmation</h3>
				<p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
					Are you sure you want to delete the selected contact?
				</p>
			</div>

			<div class="mt-6 flex justify-end">
				<x-secondary-button wire:click="close('delete-contact')">
					{{ __('No') }}
				</x-secondary-button>
	
				<x-danger-button wire:click="destroy" class="ms-3">
					{{ __('Yes') }}
				</x-danger-button>
			</div>

		</div>

	</x-modal>

</div>