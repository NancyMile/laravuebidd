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
                ->filter($filters)
                ->paginate(5)
                ->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     //   $this->authorize('create',Listing::class);
        return inertia('Realtor/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->user()->listings()->create(
            $request->validate([
                'beds' => 'required|integer|min:0|max:20',
                'baths' => 'required|integer|min:0|max:5',
                'area' => 'required|integer|min:15|max:1500',
                'city' => 'required',
                'code' => 'required',
                'street' => 'required',
                'street_number' => 'required|integer|min:1|max:1000',
                'price' => 'required|integer|min:1|max:20000000',
            ])
        );
        return redirect()->route('realtor.listing.index')->with('success','New listing created.');
    }

    public function destroy(Listing $listing)
    {
        $listing->deleteOrFail();

        return redirect()->back()->with('success','Listing deleted.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        return inertia('Realtor/Edit',['listing' => $listing]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        $listing->update(
            $request->validate([
                'beds' => 'required|integer|min:0|max:20',
                'baths' => 'required|integer|min:0|max:5',
                'area' => 'required|integer|min:15|max:1500',
                'city' => 'required',
                'code' => 'required',
                'street' => 'required',
                'street_number' => 'required|integer|min:1|max:1000',
                'price' => 'required|integer|min:1|max:20000000',
            ])
        );
        return redirect()->route('realtor.listing.index')->with('success','New listing updated');
    }
}
