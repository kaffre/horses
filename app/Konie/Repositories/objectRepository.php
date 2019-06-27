<?php
namespace App\Konie\Repositories;

use App\Konie\Gateways\ObjectGateway;

use App\ObjectModel;

use Illuminate\Support\Facades\Auth;

class objectRepository	{

	public function addObject($Request)
	{
		$object = new ObjectModel([
			'name' => $Request->name,
			'description' => $Request->description,
			'user_id' => '1'
		]);

		$object->save();
		return $object->id;
	}

	public function updateObject($Request, $id)
	{
		$Object = ObjectModel::findOrFail($id); 
		$Object->update([
			'name' => $Request->name,
			'description' => $Request->description,
			'user_id' => '1'
		]);

		$Object->save();
	}

	public function getObjectById($object_id)
	{
		return ObjectModel::findOrFail($object_id);
	}

}
