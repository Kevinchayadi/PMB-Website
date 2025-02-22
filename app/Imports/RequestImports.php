<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class RequestImports implements WithMultipleSheets
{
    /**
    * @param Collection $collection
    */
    public function sheets(): array
    {
        return [
            0 => new RequestImport(),
        ];
    }
}
