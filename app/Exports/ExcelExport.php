<?php

namespace App\Exports;

use App\Models\Currency;
use App\Models\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExcelExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(): \Illuminate\Support\Collection
    {
        return Currency::all();
    }
}
