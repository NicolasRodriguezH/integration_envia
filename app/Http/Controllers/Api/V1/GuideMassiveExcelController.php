<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Imports\CollectionGuidesImport;
use Illuminate\Http\Request;

class GuideMassiveExcelController extends Controller
{
    public function createMassiveGuides() {

        try {
            $collection = (new CollectionGuidesImport)->import(request()->file('file'));

            if ($collection) {
                return response()->json([
                    //'data' => back()->with('success', 'Excel guides imported successfully')
                    'data' => 'success, Excel guides imported successfully'
                ], 201);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
