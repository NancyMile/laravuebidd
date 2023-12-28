<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Auth;
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
            'listings' => Listing::orderByDesc('created_at')->when(
                $filters['priceFrom'] ?? false,
                fn($query,$value) => $query->where('price', '>=', $value)
            )->when(
                $filters['priceTo'] ?? false,
                fn($query,$value) => $query->where('price', '<=', $value)
            )->when(
                $filters['beds'] ?? false,
                fn($query,$value) => $query->where('beds', (int)$value < 6 ? '=' : '>=', $value)
            )->when(
                $filters['baths'] ?? false,
                fn($query,$value) => $query->when('baths',(int)$value < 6 ? '=' : '>=', $value)
            )->when(
                $filters['areaFrom'] ?? false,
                fn($query,$value) => $query->when('areaFrom', '>=', $value)
            )->when(
                $filters['areaTo'] ?? false,
                fn($query,$value) => $query->where('areaTo', '<=', $value)
            )->paginate(5)->withQueryString()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     //   $this->authorize('create',Listing::class);
        return inertia('Listing/Create');
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
        return redirect()->route('listing.index')->with('success','New listing created.');
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
        return inertia('Listing/Show',['listing' => $listing]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        return inertia('Listing/Edit',['listing' => $listing]);
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
        return redirect()->route('listing.index')->with('success','New listing updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        $listing->delete();
        return redirect()->back()->with('success','Listing was deleted');
    }
}
