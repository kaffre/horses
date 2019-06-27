<?php
namespace App\Konie\Repositories;

use Illuminate\Support\Facades\Auth;
use App\Offer;

class offerRepository
{
	public function addOffer($Request)
	{
		$offer = new Offer([
			'name' => $Request->name,
			'content' => $Request->content,
			'user_id' => Auth::user()->id,
			'category_id' => $Request->category_id,
			'position' => $Request->position
		]);

		$offer->save();
		return $offer->id;
	}

	public function updateOffer($Request, $offerId)
	{
		$Offer = Offer::findOrFail($offerId);
		$Offer->update([
			'name' => $Request->name,
			'content' => $Request->content,
			'category_id' => $Request->category_id,
			'position' => $Request->position
		]);

		$Offer->save();
	}

	public function destroyOffer($offer_id)
	{
	 	Offer::findOrFail($offer_id);
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
