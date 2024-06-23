<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
			{{ __('User') }}
		</h2>
	</x-slot>

	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
			<div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
				<div class="max-w-xl">


					<section>
						<header>
							<h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
								{{ __('User Information') }}
							</h2>

							<p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
								{{ __("Add your account's profile information and email address.") }}
							</p>
						</header>

						<form method="POST" action="{{ route('users.store') }}" class="mt-6 space-y-6">
							@csrf

							<div>
								<x-input-label for="first_name" :value="__('First Name')" />
								<x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full"
									:value="old('first_name')" required autofocus />
								<x-input-error class="mt-2" :messages="$errors->get('first_name')" />
							</div>

							<div>
								<x-input-label for="middle_name" :value="__('Middle Name')" />
								<x-text-input id="middle_name" name="middle_name" type="text" class="mt-1 block w-full"
									:value="old('middle_name')" required />
								<x-input-error class="mt-2" :messages="$errors->get('middle_name')" />
							</div>

							<div>
								<x-input-label for="last_name" :value="__('Last Name')" />
								<x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full"
									:value="old('last_name')" required />
								<x-input-error class="mt-2" :messages="$errors->get('last_name')" />
							</div>

							<div>
								<x-input-label for="email" :value="__('Email')" />
								<x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
									:value="old('email')" required />
								<x-input-error class="mt-2" :messages="$errors->get('email')" />
							</div>

							<div>
								<x-input-label for="role" :value="__('Role')" />
								<select name="role" id="role" required class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
									<option value="Administrator">Administrator</option>
									<option value="Encoder">Encoder</option>
								</select>
								<x-input-error class="mt-2" :messages="$errors->get('role')" />
							</div>

							<div>
								<x-input-label for="password" :value="__('Password')" />
								<x-text-input id="password" name="password" type="password" class="mt-1 block w-full"
								required />
								<x-input-error :messages="$errors->get('password')" class="mt-2" />
							</div>
					
							<div>
								<x-input-label for="password_confirmation" :value="__('Confirm Password')" />
								<x-text-input id="password_confirmation" name="password_confirmation" type="password"
									class="mt-1 block w-full" />
								<x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
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
								<a href="{{ route('users.index') }}"
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