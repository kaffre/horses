<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer;
use App\Category;
use Illuminate\Support\Facades\Auth;
use App\Konie\Repositories\offerRepository;
use App\Konie\Repositories\coordinateRepository;
use App\Konie\Repositories\addressRepository;
use App\Konie\Repositories\categoryRepository;
use App\Konie\Services\ImageService;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Offers;

class OfferController extends Controller
{
    protected $_coordinateRepository;
    protected $_addressRepository;
    protected $_offerRepository;
    protected $_categoryRepository;
    protected $_imageService;
	protected $type;

	 public function __construct(
        coordinateRepository $coordinateRepository,
        addressRepository $addressRepository,
        offerRepository $offerRepository,
        categoryRepository $categoryRepository,
        ImageService $imageService
        )
	{
        $this->_coordinateRepository = $coordinateRepository;
        $this->_addressRepository = $addressRepository;
        $this->_offerRepository = $offerRepository;
        $this->_categoryRepository = $categoryRepository;
        $this->_imageService = $imageService;
        $this->type = 'Offer';
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $offers = $this->_offerRepository->getAllOffers();
        $categories = $this->_categoryRepository->getAllCategories();
        return view('frontend.showOffers', ['offers' => $offers, 'categories' => $categories]);
    }

    public function create()
    {  
        $categories = Category::all();
        return view('backend.Offer.addOffer', ['categories' => $categories]);
    }

    public function store(Offers $request)
    {  
        $validated = $request->validated();
        try {
            $offer_id = $this->_offerRepository->addOffer($request);
            // $saveOfferCoordinates = $this->_coordinateRepository->saveGeocode($request, $this->type);
            $saveOfferAddress = $this->_addressRepository->saveAddress($request, $this->type, $offer_id);
            $this->_imageService->saveImage($request->file(), $this->type, $offer_id);
            return back()->with(['success' => 'Zapisano ofertę']);
        } catch (\Exception $e) {
            return back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function show($offer_id)
    {
        $offer = $this->_offerRepository->getOfferById($offer_id);

        return view('frontend.showOffer', ['offer' => $offer]);
    }

    public function edit($offer_id)
    {
       $offer =  Offer::findOrFail($offer_id);
       $categories = Category::all();

       return view('backend.Offer.editOffer', ['offer' => $offer, 'categories' => $categories]);
    }

    public function update(Request $request, $offer_id)
    {
        try {
            $updateOffer = $this->_offerRepository->updateOffer($request, $offer_id);
            // $saveOfferCoordinates = $this->_coordinateRepository->updateGeocode($request, $this->type, $offer_id);
            $saveOfferAddress = $this->_addressRepository->updateAddres($request, $this->type, $offer_id);
            return back()->with(['success' => 'zaktualizowano ofertę']);
        } catch (\Exception $e) {
            return back()->withErrors(['errors' => $e->getMessage()]);
        }
    } 

    public function destroy($offer_id)
    {
        try {
            $this->_offerRepository->destroyOffer($offer_id);
            return back();
        } catch (\Exception $e) {
            return back()->withErrors(['errors' => $e->getMessage()]);
        }
        
    }

    public function listOffers()
    {
        $offers = $this->_offerRepository->getAllOffers();
        return view('backend.Offer.listOffers', ['offers' => $offers]);
    }

}
