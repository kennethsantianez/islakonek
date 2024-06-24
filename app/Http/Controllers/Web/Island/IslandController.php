<?php

namespace App\Http\Controllers\Web\Island;

use App\Http\Controllers\Controller;
use App\Http\Requests\Island\StoreIslandRequest;
use App\Http\Requests\Island\UpdateIslandRequest;
use App\Models\Island;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IslandController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index(): View
	{
		$totalIslands = Island::count();
		return view('island.index', compact('totalIslands'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create(): View
	{
		return view('island.create');
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(StoreIslandRequest $request): RedirectResponse
	{
		Island::create($request->validated());

		toast('Island has been successfully added.', 'success');
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
	public function edit(Island $island): View
	{
		return view('island.edit', compact('island'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpdateIslandRequest $request, Island $island): RedirectResponse
	{
		$island->update($request->validated());

		toast('Island has been successfully updated.', 'success');
		return back();
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Request $id)
	{
		//
	}
}
