<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index(): View
	{
		$users = User::where('id', '!=', auth()->user()->id)->paginate(5)->withQueryString();
		return view('user.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		//
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
		$user->update($request->validated());
		return back();
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(User $user): RedirectResponse
	{
		$user->delete();
		return redirect()->route('users.index');

	}
}
