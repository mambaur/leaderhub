<?php

namespace App\Http\Controllers\Main\Guarantee;

use App\Http\Controllers\Controller;
use App\Models\Guarantee;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class GuaranteeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $serial_number = $request->serial_number;

        $guarantee = null;
        if ($serial_number) {
            $guarantee = Guarantee::where('serial_number', $serial_number)->first();
        }

        return view('guarantees.index', compact('serial_number', 'guarantee'));
    }
}
