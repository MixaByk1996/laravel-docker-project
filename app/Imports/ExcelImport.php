<?php

namespace App\Imports;

use App\Models\Currency;
use App\Models\Excel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ExcelImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return Currency
     */

    public function model(array $row)
    {
        if ($row[0] != 'CtryNm'){
            return new Currency([
                'entity' => $row[0] ?? '',
                'currency' => $row[1] ?? '',
                'alpha_code' => $row[2] ?? '',
                'number_code' => $row[3] ?? '',
                'minor_unit' => $row[4] ?? ''
            ]);
        }
        return null;
    }
}
