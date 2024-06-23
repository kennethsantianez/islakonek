<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
			{{ __('Users') }}
		</h2>
	</x-slot>

	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
				<div class="p-6 text-gray-900 dark:text-gray-100">

					{{-- table --}}
					<section class="container px-4 mx-auto">

						<div class="sm:flex sm:items-center sm:justify-between">
							<div>
								<div class="flex items-center gap-x-3">
									<h2 class="text-lg font-medium text-gray-800 dark:text-white">Users</h2>

									<span
										class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">{{
										$totalUsers }}</span>
								</div>

								<p class="mt-1 text-sm text-gray-500 dark:text-gray-300">These are all the users registered in the
									system.</p>
							</div>

							<div class="flex items-center mt-4 gap-x-3">
								<a href="{{ route('users.create') }}"
									class="ml-auto inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
									<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
										stroke="currentColor" class="w-5 h-5 mx-1">
										<path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
									</svg>
									<span class="mx-1">Add</span>
								</a>
							</div>
						</div>

						<livewire:user.user-list />

					</section>

				</div>
			</div>
		</div>
	</div>
</x-app-layout>