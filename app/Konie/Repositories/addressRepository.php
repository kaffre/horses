<?php
namespace App\Konie\Repositories;

use App\Konie\Gateways\ObjectGateway;
use App\ObjectModel;
use App\Offer;
use App\Address;

use Illuminate\Support\Facades\Auth;

Class addressRepository	{

		public function saveAddress($request, $type, $id)
		{
			$type = "App\\".$type;
			
			$Typemodel = $type::findOrFail($id);
			$address = new Address($request->all());
			$Typemodel->Address()->save($address);
		}

		public function updateAddres($request, $type, $id)
		{
			$type = "App\\".$type;

			$Typemodel = $type::findOrFail($id);
			$Typemodel->address->update($request->all());
			$Typemodel->save();
		}



}
