<?php
namespace App\Konie\Repositories;

use App\Konie\Gateways\ObjectGateway;
use App\ObjectModel;
use App\Offer;
use App\Address;

use Illuminate\Support\Facades\Auth;

Class addressRepository	{

		public function saveAddress($Request, $type, $id)
		{
			$type = "App\\".$type;

			try{
				$Typemodel = $type::findOrFail($id);

				$address = new Address([
					'country' => $Request->country,
					'city' => $Request->city,
					'street' => $Request->street,
					'number' => $Request->number,
				]);
				$save = $Typemodel->Address()->save($address);
			} catch(\Exception $e) {
				return back()->withError($e->getMessage())->withInput();
			}

			
		}

		public function updateAddres($Request, $type, $id)
		{
			$type = "App\\".$type;

			$Typemodel = $type::findOrFail($id);
			$Typemodel->address->update([
				'country' => $Request->country,
				'city' => $Request->city,
				'street' => $Request->street,
				'number' => $Request->number,
			]);

			$save = $Typemodel->save();
		}



}
