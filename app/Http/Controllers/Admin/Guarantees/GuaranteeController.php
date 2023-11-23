<?php

namespace App\Http\Controllers\Admin\Guarantees;

use App\Http\Controllers\Controller;
use App\Models\Guarantee;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class GuaranteeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Guarantee::select('guarantees.*')->with(['product']);
            return DataTables::eloquent($data)
                ->editColumn('product.name', function (Guarantee $item) {
                    $product_name = @$item->product->name ?? '';
                    return "<h6>$product_name</h6>";
                })
                ->editColumn('serial_number', function (Guarantee $item) {
                    return "<h6>$item->serial_number</h6>";
                })
                ->editColumn('expired_date', function (Guarantee $item) {
                    $expired_date = @$item->expired_date ?? '';
                    return "<h6>$expired_date</h6>";
                })
                ->editColumn('updated_at', function (Guarantee $item) {
                    $updated_at = @$item->updated_at != null ? $item->updated_at->format('Y-m-d h:i:s') : '';
                    return "<h6>" . $updated_at . "</h6>";
                })
                ->addColumn('action', function (Guarantee $item) {
                    $action = "
                    <div class='text-end'>
                        <a class='btn btn-primary py-1'
                            href='" . route('guarantee_edit', $item->id) . "'>
                            Edit</a>
                        <a href='#' class='btn btn-danger btn-delete py-1'
                            data-bs-toggle='modal' data-bs-target='#deleteModal'
                            data-url='" . route('guarantee_delete', $item->id) . "'>
                            Hapus</a>
                    </div>
                    ";

                    return $action;
                })
                ->rawColumns(['action', 'product.name', 'serial_number', 'expired_date', 'updated_at'])
                ->toJson();
        }

        return view('admin.guarantees.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.guarantees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'serial_number' => 'required',
            'purchase_date' => 'required',
            'expired_date' => 'required',
        ]);

        $product = Product::find($request->product_id);
        if (!$product) {
            toast('Produk tidak ditemukan.', 'error');
            return back()->withInput();
        }

        Guarantee::create([
            'product_id' => $product->id,
            'serial_number' => $request->serial_number,
            'purchase_date' => $request->purchase_date,
            'expired_date' => $request->expired_date,
            'period' => $request->period,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        toast('Garansi berhasil ditambahkan.', 'success');
        return redirect()->route('guarantee_list');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $guarantee = Guarantee::find($id);
        if (!$guarantee) {
            toast('Garansi tidak ditemukan', 'error');
            return back()->withInput();
        }
        return view('admin.guarantees.edit', compact('guarantee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'product_name' => 'required',
            'serial_number' => 'required',
            'purchase_date' => 'required',
            'expired_date' => 'required',
        ]);

        $guarantee = Guarantee::find($id);
        if (!$guarantee) {
            toast('Garansi tidak ditemukan', 'error');
            return back()->withInput();
        }

        $product = Product::find($request->product_id);
        if (!$product) {
            toast('Produk tidak ditemukan.', 'error');
            return back()->withInput();
        }

        $guarantee->product_id = $product->id;
        $guarantee->serial_number = $request->serial_number;
        $guarantee->purchase_date = $request->purchase_date;
        $guarantee->expired_date = $request->expired_date;
        $guarantee->period = $request->period;
        $guarantee->updated_by = auth()->user()->id;
        $guarantee->save();

        toast('Garansi berhasil diupdate.', 'success');
        return redirect()->route('guarantee_list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guarantee = Guarantee::find($id);
        if (!$guarantee) {
            toast('Garansi tidak ditemukan', 'error');
            return back()->withInput();
        }

        DB::beginTransaction();

        $guarantee->updated_by = auth()->user()->id;
        $guarantee->save();

        $guarantee->delete();

        DB::commit();

        toast('Garansi berhasil dihapus.', 'success');
        return redirect()->route('guarantee_list');
    }
}
