<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Konie\Services\CoordinateServices;

class ApiController extends Controller
{

	protected $_coordinateServices;

	public function __construct(CoordinateServices $coordinateServices)
	{
		$this->_coordinateServices = $coordinateServices;
	}

    public function getCoordinate(Request $request)
    {
    	$coordinate = $this->_coordinateServices->getGeocodeByAddress($request);

    	return $coordinate;
    }
}
