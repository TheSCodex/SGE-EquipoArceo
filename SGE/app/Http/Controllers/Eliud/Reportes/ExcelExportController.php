<?php

namespace App\Http\Controllers\Eliud\Reportes;

use App\Http\Controllers\Controller;
use App\Http\Requests\Eliud\EgresadosRequest;
use App\Models\AcademicAdvisor;
use App\Models\Academy;
use App\Models\Book;
use App\Models\BusinessAdvisor;
use App\Models\CalendarEvent;
use App\Models\Career;
use App\Models\CareerAcademy;
use App\Models\Division;
use App\Models\DocRevisions;
use App\Models\FileHistory;
use App\Models\Group;
use App\Models\Intern;
use App\Models\Project;
use App\Models\StudyGrade;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;





class ExcelExportController extends Controller
{
    public function downloadExcelFile($academic_advisor_id)
    {
        if (Gate::denies('generar-reportes-documentos')) {
            abort(403, 'No tienes permiso para acceder a esta sección.');
        }

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

        // Información sobre la revisión del formato
        $revision = DocRevisions::where('name', 'Formato Control de Estadias')->get()->first();
        $revisionDate = $revision->updated_at;
        $revisionDate = Carbon::parse($revisionDate);
        $formattedDate = $revisionDate->translatedFormat('j \d\e F \d\e\l Y');

        $sheet->setCellValue('K4', $user->name);
        $sheet->setCellValue('Z4', date('d-m-Y'));
        $sheet->setCellValue('K3', $career->name);
        $sheet->setCellValue('B37', 'Fecha de Revisión: ' . $revision->$formattedDate);
        $sheet->setCellValue('AE37', 'Revisión No. ' . $revision->revision_number);
        $sheet->setCellValue('AG37', $revision->revision_id);

        // Los campos que se poblan por filas (la información de los asesorados se va para abajo a partir de la fila 10)
        $row = 10;

        foreach ($interns as $intern) {
            $student = User::find($intern->user_id);
            $business_advisor = BusinessAdvisor::find($intern->business_advisor_id);
            $project = Project::find($intern->project_id);

            $sheet->setCellValue('C' . $row, $student->identifier);
            $sheet->setCellValue('D' . $row, $student->name);
            $spreadsheet->getActiveSheet()
                ->getStyle('AE' . $row)
                ->getAlignment()
                ->setTextRotation(0);
            $sheet->setCellValue('AE' . $row, $business_advisor?->name . $business_advisor?->email);
            $sheet->setCellValue('AF' . $row, $project?->name);
            $sheet->setCellValue('Z3', $intern->period);

            $row++;
        }

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
        if (Gate::denies('generar-reportes-documentos')) {
            abort(403, 'No tienes permiso para acceder a esta sección.');
        }
        
        $filePath = storage_path('app/spreadsheets/AEP-P03-F01 Control de estadía.xlsx');

        $newFilePath = storage_path('app/spreadsheets/AEP-P03-F01 Control de estadía_' . time() . '.xlsx');
        File::copy($filePath, $newFilePath);

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($newFilePath);
        $sheet = $spreadsheet->getActiveSheet();

        $revision = DocRevisions::where('name', 'Formato Control de Estadias')->get()->first();
        $revisionDate = $revision->updated_at;
        $revisionDate = Carbon::parse($revisionDate);
        $formattedDate = $revisionDate->translatedFormat('j \d\e F \d\e\l Y');

        $sheet->setCellValue('B37', 'Fecha de Revisión: ' . $formattedDate);
        $sheet->setCellValue('AE37', 'Revisión No. ' . $revision->revision_number);
        $sheet->setCellValue('AG37', $revision->revision_id);

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save($newFilePath);

        $publicPath = public_path('downloads/AEP-P03-F01 Control de estadía_' . time() . '.xlsx');
        File::copy($newFilePath, $publicPath);

        $response = response()->download($publicPath)->deleteFileAfterSend(true);
        unlink($newFilePath);

        return $response;
    }

    public function downloadLibrosFile()
    {
        if (Gate::denies('generar-reportes-documentos')) {
            abort(403, 'No tienes permiso para acceder a esta sección.');
        }


        $filePath = storage_path('app/spreadsheets/DONACIONES DE LIBROS.xlsx');

        $newFilePath = storage_path('app/spreadsheets/DONACIONES DE LIBROS_' . time() . '.xlsx');
        File::copy($filePath, $newFilePath);

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($newFilePath);
        $sheet = $spreadsheet->getActiveSheet();

        // Get the logged user's division
        $authUser = auth()->user();
        $division = Division::where('directorAsistant_id', $authUser->id)->first();

        // Get all the interns in the same division
        $interns = Intern::whereHas('career.academy', function ($query) use ($division) {
            $query->where('division_id', $division->id);
        })->get();

        // Populate the spreadsheet
        $row = 5;
        $counter = 1;
        foreach ($interns as $intern) {
            $student = User::find($intern->user_id);
            $book = Book::find($intern->book_id); // Fetch the book related to the intern
            $career = Career::find($intern->career_id);
            $academy = Academy::find($career->academy_id);
            $division = Division::find($academy->division_id);

            $sheet->setCellValue('C' . $row, $counter);
            $sheet->setCellValue('D' . $row, $student->name . ' ' .  $student->last_name);
            $sheet->setCellValue('E' . $row, $student->identifier);
            $sheet->setCellValue('F' . $row, "\t" . $book->created_at->format('Y-m-d'));
            $sheet->setCellValue('G' . $row, $book->price);
            $sheet->setCellValue('H' . $row, $book->title);
            $sheet->setCellValue('I' . $row, $book->author);
            $sheet->setCellValue('J' . $row, $division->name);
            $sheet->setCellValue('K' . $row, $career->name);
            $sheet->setCellValue('B1', 'RELACIÓN DE DONACIONES DE LIBROS - GENERACIÓN ' . $intern->generation);
            $sheet->setCellValue('B2', $division->name);

            $sheet->getStyle('J' . $row)
                ->getAlignment()
                ->setWrapText(true);
            $sheet->getRowDimension($row)->setRowHeight(-1);

            $row++;
            $counter++;
        }

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save($newFilePath);

        $publicPath = public_path('downloads/DONACIONES DE LIBROS_' . time() . '.xlsx');
        File::copy($newFilePath, $publicPath);

        $response = response()->download($publicPath)->deleteFileAfterSend(true);
        unlink($newFilePath);

        return $response;
    }

    public function downloadEgresadosFile(EgresadosRequest $request)
    {
        if (Gate::denies('generar-reportes-documentos')) {
            abort(403, 'No tienes permiso para acceder a esta sección.');
        }


        $validatedData = $request->validate([
            'startFolio' => ['required', 'regex:/^[a-zA-Z0-9]+$/'],
            'startFoja' => ['required', 'regex:/^[a-zA-Z0-9]+$/'],
        ]);

        $filePath = storage_path('app/spreadsheets/REP- EGRESADOS.xlsx');

        $newFilePath = storage_path('app/spreadsheets/REP- EGRESADOS_' . time() . '.xlsx');
        File::copy($filePath, $newFilePath);

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($newFilePath);
        $sheet = $spreadsheet->getActiveSheet();

        // Get the logged user's division
        $authUser = auth()->user();
        $division = Division::where('directorAsistant_id', $authUser->id)->first();
        $director = User::where('id', $division->director_id)->first();

        // Get all the interns in the same division
        $interns = Intern::whereHas('career.academy', function ($query) use ($division) {
            $query->where('division_id', $division->id);
        })->get();

        $folio = $validatedData['startFolio'];
        $foja = $validatedData['startFoja'];

        // Populate the spreadsheet
        $row = 11;
        $counter = 1;
        foreach ($interns as $intern) {
            if ($row >= 69) {
                $sheet->insertNewRowBefore($row, 1);
            }

            $student = User::find($intern->user_id);
            $career = Career::find($intern->career_id);
            $academy = Academy::find($career->academy_id);
            $division = Division::find($academy->division_id);
            $degree = StudyGrade::find($intern->study_grade_id);
            $project = Project::find($intern->project_id);

            $sheet->setCellValue('A' . $row, $counter);
            $sheet->setCellValue('B' . $row, $career->name);
            $sheet->setCellValue('C' . $row, $student->identifier);
            $last_names = explode(' ', $student->last_name);
            $sheet->setCellValue('D' . $row, $last_names[0]);
            if (isset($last_names[1])) {
                $sheet->setCellValue('E' . $row, $last_names[1]);
            }
            $sheet->setCellValue('F' . $row, $student->name);
            $sheet->setCellValue('G' . $row, $folio);
            $sheet->setCellValue('H' . $row, $foja);
            $sheet->setCellValue('J' . $row, $degree->degree);
            $sheet->setCellValue('K' . $row, $project?->name);

            // Increment the numeric part of the folio and foja
            $folio = preg_replace_callback('/\d+/', function ($matches) {
                return ++$matches[0];
            }, $folio);
            $foja = preg_replace_callback('/\d+/', function ($matches) {
                return ++$matches[0];
            }, $foja);

            $row++;
            $counter++;
        }

        $group_id = $interns[0]->group_id;
        $group = Group::find($group_id);
        $groupName = $group->name;

        $grades = [
            1 => '1er Cuatrimestre',
            2 => '2do Cuatrimestre',
            3 => '3er Cuatrimestre',
            4 => '4to Cuatrimestre',
            5 => '5to Cuatrimestre',
            6 => '6to Cuatrimestre',
            7 => '7mo Cuatrimestre',
            8 => '8vo Cuatrimestre',
            9 => '9no Cuatrimestre',
            10 => '10mo Cuatrimestre',
            11 => '11Vo Cuatrimestre',
            12 => '12Vo Cuatrimestre',
        ];

        for ($i = 0; $i < strlen($groupName); $i++) {
            $gradeNumber = intval(substr($groupName, $i, 1));
            if ($gradeNumber > 0) {
                break;
            }
        }

        if (isset($grades[$gradeNumber])) {
            $gradeTerm = $grades[$gradeNumber];
        } else {
            $gradeTerm = "N/A";
        }

        setlocale(LC_TIME, 'es_ES.UTF-8');
        $date = strftime("%d/%B/%Y");
        $date = strtoupper($date);
        $sheet->setCellValue('G4', $date);
        $sheet->setCellValue('G6', $division->name);
        $sheet->setCellValue('G7', $gradeTerm);
        $sheet->setCellValue('H5', $interns[0]->generation);
        $sheet->setCellValue('K74', $authUser->name . ' ' . $authUser->last_name);
        $sheet->setCellValue('E74', $director->name . ' ' . $director->last_name);

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save($newFilePath);

        $publicPath = public_path('downloads/REP- EGRESADOS_' . time() . '.xlsx');
        File::copy($newFilePath, $publicPath);

        $response = response()->download($publicPath)->deleteFileAfterSend(true);
        unlink($newFilePath);

        return $response;
    }
}
