<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class RealtorListingAcceptOfferController extends Controller
{
    public function __invoke(Offer $offer)
    {
        //accept selected offer
        $offer->update(['accepted_at' => now()]);

        //update the sold_at column on listings
        $offer->listing->sold_at = now();
        $offer->listing->save();

        //reject all other offers for that listing
        $offer->listing->offers()->except($offer)->update(['rejected_at'=>now()]);

        return redirect()->back()->with('success','Offer accepted');
    }
}
