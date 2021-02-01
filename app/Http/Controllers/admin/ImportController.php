<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Product;
use Session;
use App\Imports\ProdukImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class ImportController extends Controller
{
	public function importExcel(Request $request)
	{
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
		$file = $request->file('file');
		$fileName = rand() . $file->getClientOriginalName();
		$file->move('file-excel', $fileName);
		Excel::import(new ProdukImport, public_path('/file-excel/' . $fileName));
		return back();
	}
}
