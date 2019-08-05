<?php
namespace App\Konie\Helpers;

use App\ObjectModel;
use App\Offer;

Class CoordinateHelper {

	protected $_arrayOfModelObjects = array();

	public function getObjectsCollection($request, $ArrayOfCoordinateObject)
	{	
		return $this->findObjectById($request->type, $ArrayOfCoordinateObject);
	}

	protected function findObjectById($typeOfObject, $ArrayOfCoordinateObject)
	{
		$model = 'App\\'.$typeOfObject;

		foreach ($ArrayOfCoordinateObject as $coordinate) {
			if ($model::find($coordinate->coordinatetable_id)) {
				$this->_arrayOfModelObjects[] = $model::find($coordinate->coordinatetable_id);
			}
		}

		return $this->_arrayOfModelObjects;
	}
}