<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
			{{ __('Island') }}
		</h2>
	</x-slot>

	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
			<div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
				<div class="max-w-xl">


					<section>
						<header>
							<h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
								{{ __('Island Information') }}
							</h2>

							<p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
								{{ __("Add your account's profile information and email address.") }}
							</p>
						</header>

						<form method="POST" action="{{ route('islands.store') }}" class="mt-6 space-y-6">
							@csrf

							<div>
								<x-input-label for="name" :value="__('Name')" />
								<x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
									:value="old('name')" required autofocus />
								<x-input-error class="mt-2" :messages="$errors->get('name')" />
							</div>

							<div class="flex items-center gap-4">
								<x-primary-button>
									<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
										stroke-width="1.5" stroke="currentColor" class="w-4 h-5">
										<path stroke-linecap="round" stroke-linejoin="round"
											d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
									</svg>	
									{{ __('Save') }}
								</x-primary-button>
								<a href="{{ route('islands.index') }}"
									class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
									<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-5">
										<path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
									</svg>
									Back
								</a>
							</div>
						</form>
					</section>
				</div>
			</div>
		</div>
	</div>


</x-app-layout>