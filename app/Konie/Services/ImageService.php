<?php
namespace App\Konie\Services;

use App\Konie\Repositories\imagesRepository;

Class ImageService
{
	public function __construct(imagesRepository $imagesRepository)
	{
		$this->_imageRepository = $imagesRepository;
	}

	public function saveImage($files, $type, $id) 
	{
		//DODAĆ WYRZUCANIE BŁĘDÓW GDYBY JEDNAK SIĘ NIE UDAŁO ZAPISAĆ TRY CATCH
		foreach ($files as $file) {
			try{
				$path = $file->storeAs('public/'.$type.'/'.$id, $file->getClientOriginalName());

				$this->_imageRepository->saveImage($type, $id, $path);
			} catch(\Exception $e) {
				return back()->withError($e->getMessage())->withInput();
			}

				
		}
			

	}
}