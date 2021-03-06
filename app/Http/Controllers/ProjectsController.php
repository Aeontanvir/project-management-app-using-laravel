<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProjectsController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            
            $projects = Project::where('user_id', Auth::user()->id)->get();
            return view('projects.index', 
                        ['projects'=> $projects]
                    );
        }
        return redirect()->route('login');
        
    }

    public function create($company_id = null)
    {
        $companies = null;
        if(!$company_id){
            $companies = Company::where('user_id', Auth::user()->id)->get();
        }
        return view('projects.create', ['company_id'=>$company_id, 'companies'=>$companies, ]);
    }

    public function store(Request $request)
    {
        if(Auth::check()){
            $project = Project::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'days' => $request->input('days'),
                'company_id' => $request->input('company_id'),
                'user_id' => Auth::user()->id
            ]);
            if($project){
                return redirect()->route('projects.show', ['project'=> $project->id])
                ->with('success' , 'Project created successfully');
            }
        }
        
        return back()->withInput()->with('errors', 'Error creating new project');
    }

    public function show(Project $project)
    {
        $project = Project::find($project->id);
        $comments = $project->comments;
        return view('projects.show', ['project'=>$project, 'comments'=> $comments ]);
    }

    public function edit(Project $project)
    {
        $project = Project::find($project->id);
        return view('projects.edit', 
                    ['project'=> $project]
        );
    }

    public function update(Request $request, Project $project)
    {
        // update data
        $projectUpdate = Project::where('id', $project->id)
                                    ->update([
                                        'name'=> $request->input('name'),
                                        'description'=> $request->input('description')
                                    ]);
        if($projectUpdate){
            return redirect()->route('projects.show', ['id' => $project->id])
            ->with('success', "Project updated successfully!");
        }
        // redirect data
        return back()->withInput()->with('errors', "Project updated successfully!");

    }

    public function destroy(Project $project)
    {
        $findProject = Project::find($project->id);
        if($findProject->delete()) {
            return redirect()->route('projects.index')->with('success', 'Project Deleted successfully');;
        }
        return back()->withInput()->with('errors', "Project could not be deleted!");
    }
}
