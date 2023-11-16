<?php

namespace App\Http\Controllers\Main\DownloadCenter;

use App\Http\Controllers\Controller;
use App\Models\DownloadCenter;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class DownloadCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $downloads = DownloadCenter::latest()->get();
        $product_categories = ProductCategory::orderBy('name', 'asc')->get();
        return view('download_centers.index', compact('product_categories', 'downloads'));
    }
}
