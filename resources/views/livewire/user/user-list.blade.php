<div>

	<div class="mt-6 md:flex md:items-center md:justify-between">
		<div class="relative flex items-center mt-4 md:mt-0">
			<span class="absolute">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
					stroke="currentColor" class="w-5 h-5 mx-3 text-gray-400 dark:text-gray-600">
					<path stroke-linecap="round" stroke-linejoin="round"
						d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
				</svg>
			</span>

			<input type="search" placeholder="Search first name ..." wire:model.live.throttle.250ms="search" autofocus
				class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">
		</div>
	</div>

	<div class="flex flex-col mt-6">
		<div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
			<div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
				<div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
					<table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
						<thead class="bg-gray-50 dark:bg-gray-800">
							<tr>

								<th scope="col"
									class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
									First Name</th>

								<th scope="col"
									class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
									Middle Name</th>

								<th scope="col"
									class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
									Last Name</th>

								<th scope="col"
									class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
									<button class="flex items-center gap-x-2">
										<span>Status</span>
									</button>
								</th>

								<th scope="col"
									class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
									<button class="flex items-center gap-x-2">
										<span>Role</span>
									</button>
								</th>

								<th scope="col"
									class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
									Email address</th>

								<th scope="col" class="relative py-3.5 px-4">
									<span class="sr-only">Edit</span>
								</th>
							</tr>
						</thead>
						<tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">

							@forelse ($users as $user)

							<tr>
								<td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
									{{ $user->first_name }}
								</td>
								<td class="px-12 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
									{{ $user->middle_name }}
								</td>
								<td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
									{{ $user->last_name }}
								</td>
								<td class="px-12 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
									<div
										class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
										<span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>

										<h2 class="text-sm font-normal text-emerald-500">Active</h2>
									</div>
								</td>
								<td class="px-4 py-4 text-sm whitespace-nowrap">
									<div class="flex items-center gap-x-2">
										<p class="px-3 py-1 text-xs text-indigo-500 rounded-full dark:bg-gray-800 bg-indigo-100/60">
											{{ $user->role }}
										</p>
									</div>
								</td>
								<td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
									{{ $user->email }}
								</td>
								<td class="px-4 py-4 text-sm whitespace-nowrap">
									<div class="flex items-center gap-x-6">

										{{-- delete --}}
										<button wire:click="$dispatch('deleteUser', { userId: {{ $user->id }} })" class="text-gray-500 transition-colors duration-200 dark:hover:text-red-500 dark:text-gray-300 hover:text-red-500 focus:outline-none">
											<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
												<path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
											</svg>
										</button>

										{{-- edit --}}
										<a href="{{ route('users.edit', $user->id) }}"
											class="text-gray-500 transition-colors duration-200 dark:hover:text-yellow-500 dark:text-gray-300 hover:text-yellow-500 focus:outline-none">
											<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
												stroke="currentColor" class="size-6">
												<path stroke-linecap="round" stroke-linejoin="round"
													d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
												<path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
											</svg>
										</a>
									</div>
								</td>
							</tr>

							@empty

							@endforelse

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="mt-6">
		{{ $users->links() }}
	</div>

	@livewire('user.user-delete-modal')

</div>