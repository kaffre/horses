<?php
namespace App\Konie\Repositories;

use App\Konie\Gateways\ObjectGateway;
use App\Coordinate;
use Illuminate\Support\Facades\Auth;

class coordinateRepository {

		public function getGeocodeByAddress($address)
		{
			$client = new \GuzzleHttp\Client();
	   		$res = $client->get('https://maps.googleapis.com/maps/api/geocode/json?address='.$address->city.','.$address->street.','.$address->number.'&key=AIzaSyCr7ELyM3lHacbZjB8o4ldEOeNmC0n4wco&sensor=false');

			$resArray = json_decode($res->getBody(), true);

			foreach ($resArray['results'] as $list) {
				$lat = $list['geometry']['location']['lat'];
				$lng = $list['geometry']['location']['lng'];
			}
			return array($lat, $lng);
		}

		public function saveGeocode($address, $type, $id)
		{
			$geocode = $this->getGeocodeByAddress($address);
			$type = "App\\".$type;

			$Typemodel = $type::findOrFail($id);
			$coordinate = new Coordinate([
				'lat' => $geocode[0],
				'lon' => $geocode[1]
			]);
			$save = $Typemodel->coordinate()->save($coordinate);
		}		

		public function updateGeocode($address, $type, $id)
		{
			$geocode = $this->getGeocodeByAddress($address);

			$type = "App\\".$type;

			$Typemodel = $type::findOrFail($id);
			$Typemodel->coordinate->update([
				'lat' => $geocode[0],
				'lon' => $geocode[1]
			]);
			$save = $Typemodel->save();
		}

}
