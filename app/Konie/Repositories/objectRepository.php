<?php
namespace App\Konie\Repositories;

use App\Konie\Gateways\ObjectGateway;
use App\ObjectModel;
use Illuminate\Support\Facades\Auth;

class objectRepository	{

	public function getAllObjects()
	{
		$objects = ObjectModel::paginate(20);

		return $objects;
	}

	public function addObject($request)
	{
		$object = Auth::user()->object()->create($request->all());
		return $object->id;
	}

	public function updateObject($request, $object_id)
	{
		$object = ObjectModel::findOrFail($object_id);
		$object->update($request->all());
	}

	public function destroyObject($object_id)
	{
	 	return ObjectModel::findOrFail($object_id)->delete();
	}

	public function getObjectById($object_id)
	{
		return ObjectModel::findOrFail($object_id);
	}

}
