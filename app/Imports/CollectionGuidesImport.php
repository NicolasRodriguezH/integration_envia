<?php

namespace App\Imports;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class CollectionGuidesImport implements ToCollection, WithHeadingRow, WithChunkReading
{
    use Importable;

    public function startRow(): int
    {
        return 2;
    }

    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            Http::withBasicAuth('EMPCAR01', 'EMPCAR1')->post(env('API_GENERATE'), [
                'ciudad_origen' => (integer) $row['valordeclarado'],

            ]);
        }
    }

    //por si fuesen archivos muy grandes
    public function chunkSize(): int
    {
        return 500;
    }
}
