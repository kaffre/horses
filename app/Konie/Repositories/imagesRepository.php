<?php
namespace App\Konie\Repositories;

use App\Image;
use Storage;

Class imagesRepository
{

	public function saveImage($type, $id, $path) 
	{
		$type = "App\\".$type;
		$Typemodel = $type::findOrFail($id);
		try {
			$image = new Image(['name' => Storage::url($path)]);
			$Typemodel->image()->save($image);
		} catch(\Exception $e) {
			return back()->withError($e->getMessage())->withInput();
		}
	}
}