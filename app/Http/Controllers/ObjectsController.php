<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ObjectModel;
use Illuminate\Support\Facades\Auth;
use App\Konie\Repositories\objectRepository;
use App\Konie\Repositories\coordinateRepository;
use App\Konie\Repositories\addressRepository;
use App\Konie\Repositories\imagesRepository;
use App\Konie\Repositories\frontendRepository;
use App\Konie\Services\ImageService;

class ObjectsController extends Controller
{
    protected $_frontendRepository;
    protected $_objectRepository;
    protected $_coordinateRepository;
    protected $_addressRepository;
    protected $_imageService;
    private $type;

    public function __construct(
        objectRepository $objectRepository,
        coordinateRepository $coordinateRepository,
        addressRepository $addressRepository,
        imagesRepository $imagesRepository,
        frontendRepository $frontendRepository,
        ImageService $imageService
        )
    {
        $this->_frontendRepository = $frontendRepository;
        $this->_objectRepository = $objectRepository;
        $this->_coordinateRepository = $coordinateRepository;
        $this->_addressRepository = $addressRepository;
        $this->_imageService = $imageService;
        $this->type = 'ObjectModel';
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }


    public function index()
    {
    	$objects = $this->_frontendRepository->getAllObjects();
        return view('frontend.showObjects', ['objects' => $objects]);
    }

    public function create()
    {
        return view('backend.addObject');
    }
    
    public function store(Request $request)
    { 
        $object_id = $this->_objectRepository->addObject($request);
        // $this->_coordinateRepository->saveGeocode($request, $type = 'ObjectModel', $object_id);
        $this->_addressRepository->saveAddress($request, $this->type, $object_id);
        $this->_imageService->saveImage($request->file(), $this->type, $object_id);
        return back();
    }

    public function show($object_id)
    {
        $object = $this->_objectRepository->getObjectById($object_id);

        return view('frontend.showObject', ['object' => $object]);
    }

    public function edit($object_id)
    {
       $object =  ObjectModel::findOrFail($object_id);

       return view('backend.editObject', ['object' => $object]);
    }

    public function update(Request $request, $id)
    {
        $updateObject = $this->_objectRepository->updateObject($request, $id);
        $saveObjectCoordinates = $this->_coordinateRepository->updateGeocode($request, $this->type, $id);
        $saveObjectAddress = $this->_addressRepository->saveAddress($request, $this->type, $id);
        return redirect('/');
    }

    public function destroy($id)
    {
        //
    }

}
