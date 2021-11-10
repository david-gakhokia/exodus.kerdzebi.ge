<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;


class ProductsExport implements FromCollection, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::all();
    }

    // public function headings(): array
    // {
    //     return [
    //         'სტატუსი',
    //         'დასახელება',
    //         'ფასი',
    //         'აღწერა',
    //     ];
    // }

    public function map($product): array
    {
        return [
            $product->status,
            $product->name,
            $product->price,
            $product->description,
        ];
    }
}
