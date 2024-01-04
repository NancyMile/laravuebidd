<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Offer;
use App\Notifications\OfferMade;
use Illuminate\Http\Request;

class ListingOfferController extends Controller
{
    public function store(Listing $listing, Request $request)
    {
        //protect from make an offer if there is already one
        $this->authorize('view',$listing);

        $offer = $listing->offers()->save(
            Offer::make(
                $request->validate([
                    'amount' => 'required|integer|min:1|max:20000000'
                ])
            )->bidder()->associate($request->user())
        );

        //notify the owner
        $listing->owner->notify(
            new OfferMade($offer)
        );

        return redirect()->back()->with('success','Offer was made');
    }
}
