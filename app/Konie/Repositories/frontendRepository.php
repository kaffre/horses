<?php
namespace App\Konie\Repositories;

use App\Konie\Gateways\objectGateway;
use App\ObjectModel;

class frontendRepository{

	public function getAllObjects()
	{
		$objects = ObjectModel::paginate(20);

		return $objects;
	}

}
