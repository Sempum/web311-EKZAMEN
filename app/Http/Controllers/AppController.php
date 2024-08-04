<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\Category;
use App\Models\Product;
use App\Models\Sector;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AppController extends Controller
{
    public function index()
    {
        $categories = Category::all()->take(6);
        return view('layouts.main_site.index', [
            'categories' => $categories,
        ]);
    }

    public function about()
    {
        return view('layouts.main_site.about');
    }

    public function contact()
    {

        return view('layouts.main_site.contacts');
    }

    public function sectors()
    {

        return view('layouts.main_site.documentations', [
            'sectors' => Sector::all(),
            'categories' => Category::paginate(6)
        ]);
    }
    public function privacy()
    {
        return view('layouts.main_site.privacy');
    }

    public function sectorBySlug(string $sectorSlug)
    {
        $sector = Sector::where('slug', $sectorSlug)->first();
        $categories = Category::where('sector_id', $sector->id)->get();

        return view('layouts.main_site.documentations', [
            'categories' => $categories,
            'sector' => $sector,
            'sectors' => Sector::all(),
        ]);
    }

    public function categoryBySlug(string $categorySlug)
    {
        $category = Category::where('slug', $categorySlug)->first();

        return view('layouts.main_site.productsByCategory', [
            'category' => $category
        ]);
    }

    public function searchCategory(Request $request)
    {
        $search = $request->input('search');

        $categories = Category::where('name', 'LIKE', '%'. $search . '%')->get();

        return view('layouts.main_site.searchCategory', [
            'categories' => $categories,
            'sectors' => Sector::all()
        ]);
    }

    public function searchProduct(Request $request, $categorySlug)
    {

        $search = $request->input('search');
        $category = Category::where('slug', $categorySlug)->first();

        if ($request->has('search')) {
            $products = Product::where('name', 'LIKE', '%'. $search . '%')->where('category_id', $category->id)->get();
        }

        return view('layouts.main_site.searchProduct', [
            'products' => $products,
            'category' => $category
        ]);
    }
}
