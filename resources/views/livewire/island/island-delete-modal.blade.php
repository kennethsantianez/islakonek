<div>

	<x-modal name="confirm-island-deletion" maxWidth="sm" focusable>

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
					Are you sure you want to delete the selected island?
				</p>
			</div>

			<div class="mt-6 flex justify-end">
				<x-secondary-button x-on:click="$dispatch('close')">
					{{ __('No') }}
				</x-secondary-button>
	
				<x-danger-button wire:click="destroy" class="ms-3">
					{{ __('Yes') }}
				</x-danger-button>
			</div>

		</div>

	</x-modal>

</div>