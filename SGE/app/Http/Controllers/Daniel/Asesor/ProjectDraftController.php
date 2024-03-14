<?php

namespace App\Http\Controllers\Daniel\Asesor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AcademicAdvisor;
use App\Models\BusinessSector;
use Illuminate\Support\Facades\Auth;
use App\Models\BusinessAdvisor;
use App\Models\Company;
use App\Models\Intern;
use App\Models\Project;
use App\Models\Comment;



class ProjectDraftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $userId = Auth::id();
        $AcadAdvi = AcademicAdvisor::where("user_id", $userId)->first();
        $intern = Intern::where("academic_advisor_id", $AcadAdvi->id)->first();
        if(!$intern){
            return view('Daniel.asesor.AcademicAdvisorProjectDraft');
        }
        $projectId = $intern->project_id;
        $project = Project::where("id", $projectId)->first();

        $businessSector = null;
        $businessAdvisor = null;
        $company = null;
    
        if ($project->adviser_id) {
            $businessAdvisor = BusinessAdvisor::find($project->adviser_id);
    
            if ($businessAdvisor) {
                $company = Company::find($businessAdvisor->companie_id);
                if ($company) {
                    $businessSector = BusinessSector::find($company->business_sector_id);
                }
            }
        }
    
        $comments = Comment::where("project_id", $projectId)->get();
        $commenterIds = $comments->pluck('academic_advisor_id')->toArray();
        $commenters = AcademicAdvisor::whereIn("id", $commenterIds)->get();
    
        return view('Daniel.asesor.AcademicAdvisorProjectDraft', compact('comments', 'project', 'company', 'businessAdvisor', 'businessSector', 'commenters'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
