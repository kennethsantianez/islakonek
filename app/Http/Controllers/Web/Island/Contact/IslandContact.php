<?php

namespace App\Http\Controllers\Web\Island\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Island;

class IslandContact extends Controller
{
	/**
	 * Handle the incoming request.
	 */
	public function __invoke(Island $island)
	{
		return view('island.contact.index', compact('island'));
	}
}
