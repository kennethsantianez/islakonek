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
								{{ __("Update your account's profile information and email address.") }}
							</p>
						</header>

						<form id="send-verification" method="post" action="{{ route('verification.send') }}">
							@csrf
						</form>

						<form method="POST" action="{{ route('users.update', $user) }}" class="mt-6 space-y-6">
							@csrf
							@method('PATCH')

							<div>
								<x-input-label for="first_name" :value="__('First Name')" />
								<x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full"
									:value="old('first_name', $user->first_name)" required autofocus />
								<x-input-error class="mt-2" :messages="$errors->get('first_name')" />
							</div>

							<div>
								<x-input-label for="middle_name" :value="__('Middle Name')" />
								<x-text-input id="middle_name" name="middle_name" type="text" class="mt-1 block w-full"
									:value="old('middle_name', $user->middle_name)" required />
								<x-input-error class="mt-2" :messages="$errors->get('middle_name')" />
							</div>

							<div>
								<x-input-label for="last_name" :value="__('Last Name')" />
								<x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full"
									:value="old('last_name', $user->last_name)" required />
								<x-input-error class="mt-2" :messages="$errors->get('last_name')" />
							</div>

							<div>
								<x-input-label for="email" :value="__('Email')" />
								<x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
									:value="old('email', $user->email)" required autocomplete="username" />
								<x-input-error class="mt-2" :messages="$errors->get('email')" />
							</div>

							<div class="flex items-center gap-4">
								<x-primary-button>{{ __('Save') }}</x-primary-button>
							</div>
						</form>
					</section>

				</div>
			</div>
		</div>
	</div>
</x-app-layout>