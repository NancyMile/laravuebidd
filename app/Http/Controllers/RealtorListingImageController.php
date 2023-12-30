<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class RealtorListingImageController extends Controller
{
    //this action will render the form
    public  function create(Listing $listing)
    {
        return inertia('Realtor/ListingImage/Create',[
            'listing' => $listing
        ]);
    }

   // This action will accept the data sent through  the form
    public function store(Listing $listing, Request $request)
    {

    }
}
