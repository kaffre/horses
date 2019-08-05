<?php
namespace App\Konie\Services;

use App\Konie\Repositories\coordinateRepository;
use App\Konie\Services\CoordinateServices;
use App\Konie\Helpers\CoordinateHelper;

Class SearchServices
{
	protected $_coordinateRepository;
	protected $_coordinateServices;
	protected $_coordinateHelper;

	public function __construct(
		coordinateRepository $coordinateRepository,
		CoordinateServices $coordinateServices,
		CoordinateHelper $coordinateHelper
		)
	{
		$this->_coordinateRepository = $coordinateRepository;
		$this->_coordinateServices = $coordinateServices;
		$this->_coordinateHelper = $coordinateHelper;
	}

	public function getSearchResults($request)
	{
		
		$coordinateForStarterPlace = $this->_coordinateServices->getGeocodeByAddress($request);
		$ArrayOfCoordinateObject = $this->_coordinateRepository->searchByDistans($coordinateForStarterPlace, $request->distance, $request->type);
		return $this->_coordinateHelper->getObjectsCollection($request, $ArrayOfCoordinateObject);
	}

}