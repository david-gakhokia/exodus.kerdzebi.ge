<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'status'           => $row[0],
            'name_ka'          => $row[1],
            'name_en'          => $row[2],
            'name_ch'          => $row[3],
            'category_id'      => $row[4],
            'price'            => $row[5],
            'description_ka'   => $row[6],
            'description_en'   => $row[7],
            'description_ch'   => $row[8],
            'numeric'          => $row[9],
        ]);
    }
}
