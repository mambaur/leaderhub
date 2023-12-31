<?php

namespace App\Http\Controllers\Main\About;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Company;
use App\Models\ProductCategory;
use App\Models\Service;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = Company::where('key', 'about')->first();
        $services = Service::latest()->get();
        $certificates = Certificate::latest()->get();
        return view('about.index', compact('about', 'services', 'certificates'));
    }
}
