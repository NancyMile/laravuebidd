<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\ListingImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RealtorListingImageController extends Controller
{
    //this action will render the form
    public  function create(Listing $listing)
    {
        //load all the related images from the listing
        $listing->load(['images']);
        return inertia('Realtor/ListingImage/Create',[
            'listing' => $listing
        ]);
    }

   // This action will accept the data sent through  the form
    public function store(Listing $listing, Request $request)
    {
        //check if there is a file uploaded
        if($request->hasFile('images')){
            foreach($request->file('images') as $file){
                //saves the image on images folder of public
                $path = $file->store('images', 'public');

                //save on db based on the relationship images
                $listing->images()->save(new ListingImage([
                    'filename' => $path
                ]));
            }
        }

        return redirect()->back()->with('success','Images uploaded');
    }

    public function destroy($listing, ListingImage $image)
    {
        Storage::disk('public')->delete($image->filename);
        $image->delete();

        return redirect()->back()->with('success','Image removed');

    }
}
