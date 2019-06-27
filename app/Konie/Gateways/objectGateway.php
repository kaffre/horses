<?php
namespace App\Konie\Gateways;



class objectGateway	{

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


}