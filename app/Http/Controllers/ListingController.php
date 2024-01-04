<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use PhpParser\Builder\Function_;

class ListingController extends Controller
{

    public  function __construct()
    {
        $this->authorizeResource(Listing::class,'listing');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->only(['priceFrom','priceTo', 'beds','baths','areaFrom','areaTo']);

        return inertia('Listing/Index',[
            'filters' => $filters,
            'listings' => Listing::mostRecent()
            ->withoutSold()
            ->filter($filters)
            ->paginate(5)
            ->withQueryString()]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        // if(Auth::user()->cannot('view',$listing)){
        //     abort(403);
        // }
        //$this->authorize('view',$listing);

        //load images related to the listing
        $listing->load(['images']);
        $offer = !Auth::user() ? null : $listing->offers()->ByMe()->first();
        return inertia('Listing/Show',['listing' => $listing, 'offerMade' => $offer]);
    }
}
