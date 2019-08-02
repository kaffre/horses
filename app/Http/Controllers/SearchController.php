<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Konie\Services\SearchServices;

class SearchController extends Controller
{
	protected $_searchServices;

	public function __construct(
	       SearchServices $searchServices
        )
	{
        $this->_searchServices = $searchServices;
    }

    public function getResults(Request $request)
    {
    	$searchResults =  $this->_searchServices->getSearchResults($request);
    	return view('frontend.search.showResults', ['searchResults' => $searchResults]);
    }
}
