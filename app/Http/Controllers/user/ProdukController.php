<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Categories;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        //menampilkan data produk yang dijoin dengan table kategori
        //kemudian dikasih paginasi 9 data per halaman nya

        $products = DB::table('products')

            ->join('categories', 'categories.id', '=', 'products.categories_id')
            ->select('products.*', 'categories.name as nama_kategori')
            ->get();
        $kat = DB::table('categories')
            ->join('products', 'products.categories_id', '=', 'categories.id')
            ->select(DB::raw('count(products.categories_id) as jumlah, categories.*'))
            ->groupBy('categories.id')
            ->paginate(23);
        $data = array(
            'categories' => Categories::paginate(10),
            'categories' => $kat
        );
        if ($request->ajax()) {
            return datatables()
                ->of($products)
                ->addColumn('action', function ($data) {
                    $button = '<a href="produk/' . $data->id . '" data-toggle="tooltip"  
                            data-id="' . $data->id . '" data-original-title="Detail" 
                            class="Detail btn btn-info btn-sm Detail-post">
                            Detail</a>';
                    $button .= '&nbsp;&nbsp;';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('user.produk', $data);
    }
    public function detail($id)
    {
        //mengambil detail produk
        $data = array(
            'produk' => Product::findOrFail($id)
        );
        return view('user.produkdetail', $data);
    }

    public function cari(Request $request)
    {
        //mencari produk yang dicari user
        $kat = DB::table('categories')
            ->join('products', 'products.categories_id', '=', 'categories.id')
            ->select(DB::raw('count(products.categories_id) as jumlah, categories.*'))
            ->groupBy('categories.id')
            ->get();
        $data = array(
            'categories' => $kat
        );

        $prod  = Product::where('name', 'like', '%' . $request->cari . '%')->paginate(9);
        // $prod  = Categories::where('name','like','%' . $request->cari. '%')->paginate(12);
        $total = Product::where('name', 'like', '%' . $request->cari . '%')->count();
        // $total = Categories::where('name','like','%' . $request->cari. '%')->count();
        $data  = array(
            'produks' => $prod,
            'cari' => $request->cari,
            'total' => $total
        );
        // dd($data);
        return view('user.cariproduk', $data);
    }
}
