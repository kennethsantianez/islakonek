<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index(): View
	{
		$totalUsers = User::count();
		return view('user.index', compact('totalUsers'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		return view('user.create');
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(StoreUserRequest $request): RedirectResponse
	{
		$user = User::create($request->validated());
		
		toast('User has been successfully added.', 'success');
		return back();
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(User $user): View
	{
		return view('user.edit', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpdateUserRequest $request, User $user): RedirectResponse
	{
		$data = $request->validated();

		$user->first_name 	= $data['first_name'];
		$user->middle_name 	= $data['middle_name'];
		$user->last_name 		= $data['last_name'];
		$user->email 				= $data['email'];
		$user->role 				= $data['role'];

		if ( isset($data['password']) ) {
			$user->password		= $data['password'];
		}

		if ($user->isDirty('email')) {
			$user->email_verified_at = null;
		}

		$user->save();

		toast('User has been successfully updated.', 'success');
		return back();
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(User $user): RedirectResponse
	{
		$user->delete();

		toast('User has been successfully deleted.', 'success');
		return redirect()->route('users.index');

	}
}
