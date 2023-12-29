<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RealtorListingController extends Controller
{
    //applying ListingPolicy
    public function __construct()
    {
        $this->authorizeResource(Listing::class,'listing');
    }

    public function index(Request $request)
    {
        $filters = [
            'deleted' => $request->boolean('deleted'),
            ...$request->only(['by','order'])
        ];
        return inertia('Realtor/Index',[
            'filters' => $filters,
            'listings' => Auth::user()
                ->listings()
                //->mostRecent()
                ->filter($filters)
                ->get()
        ]);
    }

    public function destroy(Listing $listing)
    {
        $listing->deleteOrFail();

        return redirect()->back()->with('success','Listing deleted.');
    }
}
