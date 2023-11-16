<?php

namespace App\Http\Controllers\Main\Contact;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = Company::all()->groupBy('key');
        $product_categories = ProductCategory::orderBy('name', 'asc')->get();

        $map = @$company['map'][0]->value;

        $start = strpos($map, 'src="') + 5; // Cari posisi awal nilai src
        $end = strpos($map, '"', $start); // Cari posisi akhir nilai src
        $src = substr($map, $start, $end - $start); // Ambil nilai src dari string HTML

        return view('contacts.index', compact('product_categories', 'company', 'src'));
    }
}
