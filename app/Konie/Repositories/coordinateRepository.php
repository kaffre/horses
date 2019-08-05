<?php
namespace App\Konie\Repositories;

use App\Konie\Gateways\ObjectGateway;
use App\Coordinate;
use Illuminate\Support\Facades\Auth;
use App\Konie\Services\CoordinateServices;
use Illuminate\Support\Facades\DB;

class coordinateRepository 
{
	protected $_coordinateServices;

	public function __construct(CoordinateServices $coordinateServices)
	{
		$this->_coordinateServices = $coordinateServices;
	}


	public function saveGeocode($request, $type, $id)
	{
		$type = "App\\".$type;

		$Typemodel = $type::findOrFail($id);
		$coordinate = new Coordinate($request->all());

		$save = $Typemodel->coordinate()->save($coordinate);
	}		

	public function updateGeocode($request, $type, $id)
	{
		$type = "App\\".$type;

		$Typemodel = $type::findOrFail($id);
		$coordinate = new Coordinate($request->all());
		$save = $Typemodel->save();
	}

	public function searchByDistans($coordinateForStarterPlace, $distance, $type)
	{
		// $object =  Coordinate::table("coordinates")->select("coordinatetable_id"
  //       ,DB::raw("6371 * acos(cos(radians(".$coordinateForStarterPlace['lat'].")) 
  //       * cos(radians(coordinates.lat)) 
  //       * cos(radians(coordinates.lon) - radians(".$coordinateForStarterPlace['lng'].")) 
  //       + sin(radians(".$coordinateForStarterPlace['lat'].")) 
  //       * sin(radians(coordinates.lat))) AS distance"))
  //       ->having('distance', '<', $distance)
  //       ->where('coordinatetable_type', 'App\\'.$type)
  //       ->groupBy("coordinates.id")
  //       ->get();
			$object =  Coordinate::select("coordinatetable_id"
        ,DB::raw("6371 * acos(cos(radians(".$coordinateForStarterPlace['lat'].")) 
        * cos(radians(coordinates.lat)) 
        * cos(radians(coordinates.lon) - radians(".$coordinateForStarterPlace['lng'].")) 
        + sin(radians(".$coordinateForStarterPlace['lat'].")) 
        * sin(radians(coordinates.lat))) AS distance"))
        ->having('distance', '<', $distance)
        ->where('coordinatetable_type', 'App\\'.$type)
        ->groupBy("coordinates.id")
        ->get();

        return $object;
	}

}
