<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\Childcategory;

class FrontendController extends Controller
{
    public function findBasedOnCategory(Category $categorySlug)
    {
        $advertisements = $categorySlug->ads()->paginate(20);

        $filterBySubcategory = Subcategory::where('category_id', $categorySlug->id)->get();

        return view('product.category', compact('advertisements', 'filterBySubcategory'));
    }


    public function findBasedOnSubcategory(Request $request, $categorySlug, Subcategory $subcategorySlug)
    {
        //code without price filter
        //$advertisements = $subcategorySlug->ads;
        //$filterByChildCategories = $subcategorySlug->ads->unique('childcategory_id');
        //return view('product.subcategory', compact('advertisements', 'filterByChildCategories'));

        //for test


        //end test

        $advertisementBasedOnFilter = Advertisement::where(
            'subcategory_id',
            $subcategorySlug->id
        )->when($request->minPrice, function ($query, $minPrice) {
            return $query->where('price', '>=', $minPrice);
        })->when($request->maxPrice, function ($query, $maxPrice) {
            return $query->where('price', '<=', $maxPrice);
        })->paginate(20);

        //TODO filter is not working properly only working with 3 digit price
        $advertisementWithoutFilter = $subcategorySlug->ads()->paginate(20);


        $childCategoryByFilterId = $subcategorySlug->ads->unique('childcategory_id');

        $advertisements = $request->minPrice || $request->maxPrice ?
            $advertisementBasedOnFilter : $advertisementWithoutFilter;

        return view('product.subcategory', compact('advertisements', 'childCategoryByFilterId'));
    }

    public function findBasedOnChildcategory(
        $categorySlug,
        Subcategory $subcategorySlug,
        Childcategory $childcategorySlug,
        Request $request
    ) {
        $advertisementBasedOnFilter = Advertisement::where(
            'childcategory_id',
            $childcategorySlug->id
        )->when($request->minPrice, function ($query, $minPrice) {
            return $query->where('price', '>=', $minPrice);
        })->when($request->maxPrice, function ($query, $maxPrice) {
            return $query->where('price', '<=', $maxPrice);
        })->paginate(20);

        $advertisementWithoutFilter = $childcategorySlug->ads()->paginate(20);

        $filterByChildCategories = $subcategorySlug->ads->unique('childcategory_id');

        $advertisements = $request->minPrice || $request->maxPrice ?
            $advertisementBasedOnFilter : $advertisementWithoutFilter;

        return view('product.childcategory', compact(
            'advertisements',
            'filterByChildCategories'
        ));
    }

    //for indivisual ads
    public function show($id, $slug)
    {
        $advertisement = Advertisement::where('id', $id)->where('slug', $slug)->first();

        return view('product.show', compact('advertisement'));
    }

    //show any particular user's ads
    public function viewuserAds($id)
    {
        $advertisements = Advertisement::latest()->where('user_id', $id)->paginate(20);
        $user = User::find($id);
        return view('seller.ads', compact('advertisements', 'user'));
    }
}
