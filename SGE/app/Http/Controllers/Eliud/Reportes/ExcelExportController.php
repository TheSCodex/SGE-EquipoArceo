<?php

namespace App\Http\Controllers\Eliud\Reportes;

use App\Http\Controllers\Controller;
use App\Models\AcademicAdvisor;
use App\Models\Career;
use App\Models\CareerAcademy;
use App\Models\Intern;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;




class ExcelExportController extends Controller
{
    public function downloadExcelFile($academic_advisor_id)
    {
        $filePath = storage_path('app/spreadsheets/AEP-P03-F01 Control de estadía.xlsx');

        $newFilePath = storage_path('app/spreadsheets/AEP-P03-F01 Control de estadía_' . time() . '.xlsx');
        File::copy($filePath, $newFilePath);

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($newFilePath);
        $sheet = $spreadsheet->getActiveSheet();

        // Información del asesor academico
        $academic_advisor = AcademicAdvisor::find($academic_advisor_id);
        $user = User::find($academic_advisor->user_id);

        //Carrera
        $career = Career::find($academic_advisor->career_id);

        // Información de los practicantes para el asesor academico actual
        $interns = Intern::where('academic_advisor_id', $academic_advisor_id)->get();


        $sheet->setCellValue('K4', $user->name);
        $sheet->setCellValue('Z4', date('d-m-Y'));
        $sheet->setCellValue('K3', $career->name);

        // Los campos que se poblan por filas (la información de los asesorados se va para abajo a partir de la fila 10)
        $row = 10;

        $jsonData = [];


        foreach ($interns as $intern) {
            $student = User::find($intern->user_id);

            $jsonData[] = [
                'student_id' => $student->identifier,
                'student_name' => $student->name,
                'period' => $intern->period,
            ];

            $sheet->setCellValue('C' . $row, $student->identifier);
            $sheet->setCellValue('D' . $row, $student->name);
            $sheet->setCellValue('Z3', $intern->period);

            $row++;
        }

        $jsonData = json_encode($jsonData);


        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save($newFilePath);

        $publicPath = public_path('downloads/AEP-P03-F01 Control de estadía_' . time() . '.xlsx');
        File::copy($newFilePath, $publicPath);

        $response = response()->download($publicPath)->deleteFileAfterSend(true);
        unlink($newFilePath);

        return $response;
    }

    public function generateExcelFormatFile()
    {
        $filePath = storage_path('app/spreadsheets/AEP-P03-F01 Control de estadía.xlsx');

        $newFilePath = storage_path('app/spreadsheets/AEP-P03-F01 Control de estadía_' . time() . '.xlsx');
        File::copy($filePath, $newFilePath);

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($newFilePath);
        $sheet = $spreadsheet->getActiveSheet();

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save($newFilePath);

        $publicPath = public_path('downloads/AEP-P03-F01 Control de estadía_' . time() . '.xlsx');
        File::copy($newFilePath, $publicPath);

        $response = response()->download($publicPath)->deleteFileAfterSend(true);
        unlink($newFilePath);

        return $response;
    }
}
