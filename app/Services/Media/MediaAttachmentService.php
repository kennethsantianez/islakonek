<?php

namespace App\Services\Media;

use Illuminate\Database\Eloquent\Model;

class MediaAttachmentService
{

	public function uploadSingle(Model $model, $file, $collectionName = null)
	{
		$model->clearMediaCollection($collectionName);

		$extension = $file->getClientOriginalExtension(); //Extension
		$newFilename = uniqid() . '.' . $extension; // unique filename

		$model->addMedia($file)->usingFileName($newFilename)->toMediaCollection($collectionName); // add media to collection

		return $model;
	}

	public function uploadMultiple(Model $model, $files, $collectionName = null)
	{

		foreach($files as $key => $item){
			$extension = $item->getClientOriginalExtension(); //Extension
			$newFilename = uniqid() . '.' . $extension; // unique filename

			$model->addMedia($item)->usingFileName($newFilename)->toMediaCollection($collectionName); // add media to default collection
		}

		return $model;
	}
}
