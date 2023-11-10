<?php

namespace App\Http\Controllers\Admin\About;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function company(Request $request)
    {
        $company = Company::where('key', 'about')->first();
        return view('admin.about.company', compact('company'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function updateCompany(Request $request)
    {
        $company = Company::where('key', 'about')->first();
        if (!$company) {
            $company = Company::create([
                'key' => 'about',
                'title' => 'about',
                'value' => $request->description,
                'created_by' => @auth()->user()->id,
                'updated_by' => @auth()->user()->id,
            ]);
        } else {
            $company->value = $request->description;
            $company->updated_by = @auth()->user()->id;
            $company->save();
        }

        toast('Company information successfully updated', 'success');
        return redirect()->route('company');
    }

    /**
     * Display a listing of the resource.
     */
    public function location(Request $request)
    {
        $contact = Company::where('key', 'contact')->first();
        $address = Company::where('key', 'address')->first();
        $map = Company::where('key', 'map')->first();
        return view('admin.about.location', compact('contact', 'address', 'map'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function updateLocation(Request $request)
    {
        DB::beginTransaction();
        $company = Company::where('key', 'contact')->first();
        if (!$company) {
            $company = Company::create([
                'key' => 'contact',
                'title' => 'contact',
                'value' => $request->contact,
                'created_by' => @auth()->user()->id,
                'updated_by' => @auth()->user()->id,
            ]);
        } else {
            $company->value = $request->contact;
            $company->updated_by = @auth()->user()->id;
            $company->save();
        }

        $company = Company::where('key', 'address')->first();
        if (!$company) {
            $company = Company::create([
                'key' => 'address',
                'title' => 'address',
                'value' => $request->address,
                'created_by' => @auth()->user()->id,
                'updated_by' => @auth()->user()->id,
            ]);
        } else {
            $company->value = $request->address;
            $company->updated_by = @auth()->user()->id;
            $company->save();
        }

        $company = Company::where('key', 'map')->first();
        if (!$company) {
            $company = Company::create([
                'key' => 'map',
                'title' => 'map',
                'value' => $request->map,
                'created_by' => @auth()->user()->id,
                'updated_by' => @auth()->user()->id,
            ]);
        } else {
            $company->value = $request->map;
            $company->updated_by = @auth()->user()->id;
            $company->save();
        }

        DB::commit();

        toast('Company location successfully updated', 'success');
        return redirect()->route('location');
    }
}
