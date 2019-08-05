<?php

namespace App\Konie\Services;

use App\Konie\Repositories\imagesRepository;
use Illuminate\Support\Facades\Storage;

Class ImageService
{
	public function __construct(imagesRepository $imagesRepository)
	{
		$this->_imageRepository = $imagesRepository;
	}

	public function saveImage($request, $type, $id) 
	{
		foreach ($request->file()['input_img'] as $file) {
			$path = $file->storeAs('public/'.$type.'/'.$id, $file->getClientOriginalName());
			$this->_imageRepository->saveImage($type, $id, $path);
		}
	}

	public function updateImage($request, $type, $id) 
	{

		if (isset($request->imageForDelete)) {
			$this->deleteImage($request);
		}
		if (!empty($request->file())) {
			$this->saveImage($request, $type, $id);
		}
	}

	protected function deleteImage($request)
	{
		foreach ($request->imageForDelete as $imageId) {
			$image = $this->_imageRepository->findImageById($imageId);
			$imagePathForDelete = str_replace('/storage', '/public', $image->name);
			Storage::delete($imagePathForDelete);
			$this->_imageRepository->deleteImage($imageId);
		}
	}
}