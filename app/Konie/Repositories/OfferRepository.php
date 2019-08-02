<?php
namespace App\Konie\Repositories;

use Illuminate\Support\Facades\Auth;
use App\Offer;

class offerRepository
{
	public function addOffer($request)
	{
		$offer = Auth::user()->offer()->create($request->all());
		return $offer->id;
	}

	public function updateOffer($request, $offerId)
	{
		$Offer = Offer::findOrFail($offerId);
		$Offer->update($request->all());
	}

	public function destroyOffer($offer_id)
	{
	 	Offer::findOrFail($offer_id)->delete();
	}

	public function getAllOffers()
	{
		return Offer::paginate(20);
	}

	public function getOfferById($offer_id)
	{
		return Offer::findOrFail($offer_id);
	}
}
