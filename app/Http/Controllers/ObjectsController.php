<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ObjectModel;
use Illuminate\Support\Facades\Auth;
use App\Konie\Repositories\objectRepository;
use App\Konie\Repositories\coordinateRepository;
use App\Konie\Repositories\addressRepository;
use App\Konie\Repositories\imagesRepository;
use App\Konie\Services\ImageService;
use App\Http\Requests\Objects;


class ObjectsController extends Controller
{
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
        ImageService $imageService
        )
    {
        $this->_objectRepository = $objectRepository;
        $this->_coordinateRepository = $coordinateRepository;
        $this->_addressRepository = $addressRepository;
        $this->_imageService = $imageService;
        $this->type = 'ObjectModel';
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->middleware('cache', ['except' => ['store', 'update' ]]);
    }


    public function index()
    {
    	$objects = $this->_objectRepository->getAllObjects();
        return view('frontend.Object.showObjects', ['objects' => $objects, 'model' => 'ObjectModel']);
    }

    public function create()
    {
        return view('backend.Object.addObject');
    }
    
    public function store(Objects $request)
    { 
        $validated = $request->validated();
        try {
            $object_id = $this->_objectRepository->addObject($request);
            $this->_coordinateRepository->saveGeocode($request, $type = 'ObjectModel', $object_id);
            $this->_addressRepository->saveAddress($request, $this->type, $object_id);
            $this->_imageService->saveImage($request, $this->type, $object_id);
            return response()->json(['success'=>'Dodano obiekt.']);
        } catch (\Exception $e) {
            return back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function show($object_id)
    {
        $object = $this->_objectRepository->getObjectById($object_id);

        return view('frontend.Object.showObject', ['object' => $object]);
    }

    public function edit($object_id)
    {
       $object =  ObjectModel::findOrFail($object_id);

       return view('backend.Object.editObject', ['object' => $object]);
    }

    public function update(Objects $request, $object_id)
    {
        $validated = $request->validated();
        try {
            $this->_objectRepository->updateObject($request, $object_id);
            $this->_coordinateRepository->updateGeocode($request, $this->type, $object_id);
            $this->_addressRepository->saveAddress($request, $this->type, $object_id);
            $this->_imageService->updateImage($request, $this->type, $object_id);
             return response()->json(['success' =>'zaktualizowano obiekt']);
        } catch (\Exception $e) {
            return back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function destroy($object_id)
    {
        try {
            $this->_objectRepository->destroyObject($object_id);
            return back();
        } catch (\Exception $e) {
            return back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function listObjects()
    {
        $objects = $this->_objectRepository->getAllObjects();
        return view('backend.Object.listObjects', ['objects' => $objects]);
    }

}
