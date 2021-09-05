<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\Subcategory;

class HomepageController extends Controller
{
    public function index()
    {
        //for category car
        $category = Category::CategoryCar();
        $firstAds = Advertisement::firstFourAdsInCaurosel($category->id);
        $secondAds = Advertisement::secondFourAdsInCaurosel($category->id);

        //for category electronics
        $categoryElectronics = Category::CategoryElectronics();
        $firstAdsForElectronics = Advertisement::firstFourAdsInCauroselForElectronics($categoryElectronics->id);
        $secondAdsForElectronics = Advertisement::firstFourAdsInCauroselForElectronics($categoryElectronics->id);

        //get all categories
        $categories = Category::get();

        //return to home with all variable
        return view('home', compact(
            'firstAds',
            'secondAds',
            'category',
            'categoryElectronics',
            'firstAdsForElectronics',
            'secondAdsForElectronics',
            'categories'
        ));
    }

    public function search(Request $request)
    {

        $advertisements =  Advertisement::where('category_id', $request->categoryId)->where('name', 'like', '%' .$request->search . '%')->paginate(20);
        $subcategories = Subcategory::where('category_id', $request->categoryId)->get();
        $category = Category::find($request->categoryId);
        return view('product.search' , compact('advertisements', 'subcategories', 'category'));
    }
}
