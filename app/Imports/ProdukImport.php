<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;

class ProdukImport implements
    ToModel,
    WithHeadingRow
{
    use  SkipsErrors, SkipsFailures;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Product([
            'description' => $row['kode_barang'],
            'name' => $row['name'],
            'image' => $row['photo'],
            'price' => $row['harga'],
            'weigth' => $row['unit'],
            'categories_id' => $row['kategori'],
            // 'stok' => $row[],
        ]);
    }
}
