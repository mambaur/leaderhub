<?php

namespace App\Http\Controllers\Admin\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function company(Request $request)
    {
        return view('admin.about.company');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function updateCompany(Request $request)
    {
        //
    }

    /**
     * Display a listing of the resource.
     */
    public function location(Request $request)
    {
        return view('admin.about.location');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function updateLocation(Request $request)
    {
        //
    }
}
