<?php

namespace App\Services\Avatar;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class AvatarService 
{

	public function store(Model $model, string $seed, $collectionName = null)
	{
		$response = Http::get('https://api.dicebear.com/9.x/pixel-art/svg', [
			'seed' => 'Ginger',
			// 'radius' => 50,
			// 'size' => 48,
			// 'backgroundType' => 'gradientLinear'
		]);

		if ($response->successful()) {
			// Get the SVG content
			$svg = $response->body();

			$newFilename = uniqid() . '.svg'; // unique filename

			// Ensure the temp directory exists
			if (!Storage::exists('temp')) {
				Storage::makeDirectory('temp');
			}

			// Define the temporary file path
			$tempDir = storage_path('app/temp');
			$tempFilePath = $tempDir . '/' . $newFilename;

			// Save the SVG content to the temporary file
			Storage::put('temp/' . $newFilename, $svg);

			// Verify if the file exists before adding to the media collection
			if (Storage::exists('temp/' . $newFilename)) {
				// Add the temporary file to the media collection
				$model->addMedia($tempFilePath)
							->usingFileName($newFilename)
							->toMediaCollection($collectionName);

				// Optionally, delete the temporary file after adding it to the media collection
				Storage::delete('temp/' . $newFilename);

				return $model;

			} else {
				return false;
			}

		} else {
			return false;
		}

	}

}