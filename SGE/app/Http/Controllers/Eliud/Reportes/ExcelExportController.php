<?php

namespace App\Http\Controllers\Eliud\Reportes;

use App\Http\Controllers\Controller;
use App\Models\AcademicAdvisor;
use App\Models\Book;
use App\Models\BusinessAdvisor;
use App\Models\CalendarEvent;
use App\Models\Career;
use App\Models\CareerAcademy;
use App\Models\Division;
use App\Models\FileHistory;
use App\Models\Intern;
use App\Models\Project;
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

        foreach ($interns as $intern) {
            $student = User::find($intern->user_id);
            $business_advisor = BusinessAdvisor::find($intern->business_advisor_id);
            $project = Project::find($intern->project_id);

            $sheet->setCellValue('C' . $row, $student->identifier);
            $sheet->setCellValue('D' . $row, $student->name);
            $sheet->setCellValue('AE' . $row, $business_advisor?->name . $business_advisor?->email);
            $sheet->setCellValue('AF' . $row, $project?->name);
            $sheet->setCellValue('Z3', $intern->period);

            $row++;
        }

        // Eventos del asesor
        $calendarEvents = CalendarEvent::where('requester_id', $academic_advisor_id)->orderBy('date_start')->take(11)->get();

        $column = 'P';
        foreach ($calendarEvents as $event) {
            if ($column > 'Z') {
                break;
            }
            $date = date('d-m-Y', strtotime($event->date_start));
            $sheet->setCellValue($column . '9', $date);
            $column++;
        }

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save($newFilePath);

        $publicPath = public_path('downloads/AEP-P03-F01 Control de estadía_' . time() . '.xlsx');
        File::copy($newFilePath, $publicPath);

        $response = response()->download($publicPath)->deleteFileAfterSend(true);
        unlink($newFilePath);


        $jsonData[] = [
            'title' => "Control de Estadías",
            'advisor_identifier' => $user->identifier,
            'advisor_email' => $user->email,
            'advisor_name' => $user->name,
            'advisor_lastName' => $user->last_name,
            'user_id' => $user->id,
            'academic_advisor_id' => (int) $academic_advisor_id,
        ];

        $authUser = auth()->user();
        if ($authUser->role->title != 'director' && $authUser->role->title != 'asistenteDireccion') {
            $fileHistory = new FileHistory($jsonData[0]);
            $fileHistory->save();
        }
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

    public function downloadEgresadosFile($startFolio, $startFoja)
    {
        $filePath = storage_path('app/spreadsheets/CONTROL DE EGRESADOS.xlsx');

        $newFilePath = storage_path('app/spreadsheets/CONTROL DE EGRESADOS_' . time() . '.xlsx');
        File::copy($filePath, $newFilePath);

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($newFilePath);
        $sheet = $spreadsheet->getActiveSheet();

        // Get the logged user's division
        $authUser = auth()->user();
        $division = Division::where('directorAssistantId', $authUser->id)->first();

        // Get all the interns in the same division
        $interns = Intern::whereHas('career.academy', function ($query) use ($division) {
            $query->where('division_id', $division->id);
        })->get();

        $folio = $startFolio;
        $foja = $startFoja;

        // Populate the spreadsheet
        $row = 4;
        foreach ($interns as $intern) {
            $student = User::find($intern->user_id);
            $book = Book::find($intern->book_id); // Fetch the book related to the intern

            $sheet->setCellValue('C' . $row, $student->name);
            $sheet->setCellValue('D' . $row, $student->identifier);
            $sheet->setCellValue('E' . $row, $book->created_at);
            $sheet->setCellValue('F' . $row, $book->price);
            $sheet->setCellValue('G' . $row, $book->title);
            $sheet->setCellValue('H' . $row, $book->author);

            $sheet->setCellValue('I' . $row, $folio);
            $sheet->setCellValue('J' . $row, $foja);

            // Increment the numeric part of the folio and foja
            $folio = preg_replace_callback('/\d+/', function ($matches) {
                return ++$matches[0];
            }, $folio);
            $foja = preg_replace_callback('/\d+/', function ($matches) {
                return ++$matches[0];
            }, $foja);

            $row++;
        }

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save($newFilePath);

        $publicPath = public_path('downloads/CONTROL DE EGRESADOS_' . time() . '.xlsx');
        File::copy($newFilePath, $publicPath);

        $response = response()->download($publicPath)->deleteFileAfterSend(true);
        unlink($newFilePath);

        return $response;
    }
}
