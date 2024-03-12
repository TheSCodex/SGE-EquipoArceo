<?php

namespace App\Http\Controllers\Eliud\Reportes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;




class ExcelExportController extends Controller
{
    public function downloadExcelFile()
    {
        $filePath = storage_path('app/spreadsheets/AEP-P03-F01 Control de estadía.xlsx');  // Ruta al archivo Excel en tu aplicación

        // Copia el archivo al directorio public temporalmente para su descarga
        $publicPath = public_path('downloads/AEP-P03-F01 Control de estadía.xlsx');
        File::copy($filePath, $publicPath);

        // Exporta el archivo para su descarga
        return response()->download($publicPath)->deleteFileAfterSend(true);
    }
}
