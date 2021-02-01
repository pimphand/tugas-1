<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Categories;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = DB::table('products')

            ->join('categories', 'categories.id', '=', 'products.categories_id')
            ->select('products.*', 'categories.name as nama_kategori')
            ->get();
        // $data = array(
        //     'products' => $products
        // );

        if ($request->ajax()) {
            return datatables()
                ->of($products)
                ->addColumn('action', function ($data) {
                    $button = '<a href="product/edit/' . $data->id . '" data-toggle="tooltip"  
                            data-id="' . $data->id . '" data-original-title="Edit" 
                            class="edit btn btn-info btn-sm edit-post">
                            Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    $button = $button . '<a href="product/delete/' . $data->id . '" data-toggle="tooltip" 
                            onClick=Delete(this.id)" id="' . $data->id . '
                             " data-original-title=Delete" 
                             class="btn btn-danger btn-sm"> 
                             <i class="fa fa-trash"></i>Hapus</a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.product.index');
    }

    public function tambah()
    {
        //menampilkan form tambah kategori

        $data = array(
            'categories' => Categories::all(),
        );
        return view('admin.product.tambah', $data);
    }

    public function store(Request $request)
    {
        //menyimpan produk ke database
        if ($request->file('image')) {
            //simpan foto produk yang di upload ke direkteri public/storage/imageproduct
            $file = $request->file('image')->store('imageproduct', 'public');

            Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'stok' => $request->stok,
                'weigth' => $request->weigth,
                'categories_id' => $request->categories_id,

                'image' => $file

            ]);

            return redirect()->route('admin.product')->with('status', 'Berhasil Menambah Produk Baru');
        }
    }

    public function edit($id)
    {
        //menampilkan form edit
        //dan mengambil data produk sesuai id dari parameter
        $data = array(
            'product' => Product::findOrFail($id),
            'categories' => Categories::all(),
        );
        return view('admin.product.edit', $data);
    }

    public function update($id, Request $request)
    {
        //ambil data dulu sesuai parameter $Id
        $prod = Product::findOrFail($id);

        // Lalu update data nya ke database
        if ($request->file('image')) {

            Storage::delete('public/' . $prod->image);
            $file = $request->file('image')->store('imageproduct', 'public');
            $prod->image = $file;
        }

        $prod->name = $request->name;
        $prod->description = $request->description;
        $prod->price = $request->price;
        $prod->weigth = $request->weigth;
        $prod->categories_id = $request->categories_id;
        $prod->stok = $request->stok;


        $prod->save();

        return redirect()->route('admin.product')->with('status', 'Berhasil Mengubah Kategori');
    }

    public function delete($id)
    {
        //mengahapus produk
        $prod = Product::findOrFail($id);
        Product::destroy($id);
        Storage::delete('public/' . $prod->image);
        return redirect()->route('admin.product')->with('status', 'Berhasil Mengahapus Produk');
    }
}
