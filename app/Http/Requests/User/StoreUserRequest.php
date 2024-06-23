<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 */
	public function authorize(): bool
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
	 */
	public function rules(): array
	{
		return [
			'first_name' => [
				'required',
				'string',
				'max:255'
			],
			'middle_name' => [
				'required',
				'string',
				'max:255'
			],
			'last_name' => [
				'required',
				'string',
				'max:255'
			],
			'role' => [
				'required',
				'string',
				'max:255',
				Rule::in('Administrator', 'Encoder')
			],
			'email' => [
				'required',
				'string',
				'max:255',
				'lowercase',
				'email',
				Rule::unique(User::class)
			],
			'password' => ['required', 'confirmed', Password::defaults()],
		];
	}
}
