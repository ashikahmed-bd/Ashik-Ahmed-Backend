<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Http\Requests\ProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;
use Symfony\Component\HttpFoundation\Response;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::query()->paginate();
        return ProjectResource::collection($projects);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        $project = new Project();
        $project->user_id = Auth::id();
        $project->title = $request->title;
        $project->slug = Str::slug($request->title);
        $project->meta_title = $request->meta_title;
        $project->meta_description = $request->meta_description;
        $project->meta_keywords = $request->meta_keywords;
        $project->overview = $request->overview;
        $project->description = $request->description;

        if ($request->hasFile('image')){
            $imagePath = $request->file('image')->store('projects', config('app.disk'));
            Image::read($request->file('image'))->resize('1024', '768')->save(Storage::disk(config('app.disk'))->path($imagePath));
            $project->image = $imagePath;
        }

        $project->link = $request->link;
        $project->status = $request->status;
        $project->save();

        return response()->json([
            'success' => true,
            'message' => trans('messages.updated', ['type' => 'Project']),
            'data' => ProjectResource::make($project),

        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::query()->findOrFail($id);
        return ProjectResource::make($project);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, string $id)
    {
        $project = Project::query()->findOrFail($id);
        $project->title = $request->title;
        $project->slug = Str::slug($request->title);
        $project->meta_title = $request->meta_title;
        $project->meta_description = $request->meta_description;
        $project->meta_keywords = $request->meta_keywords;
        $project->overview = $request->overview;
        $project->description = $request->description;

        if ($request->hasFile('image')){
            $imagePath = $request->file('image')->store('projects', config('app.disk'));
            Image::read($request->file('image'))->resize('1024', '768')->save(Storage::disk(config('app.disk'))->path($imagePath));
            $project->image = $imagePath;
        }

        $project->link = $request->link;
        $project->status = $request->status;
        $project->update();

        return response()->json([
            'success' => true,
            'message' => trans('messages.updated', ['type' => 'Project']),
            'data' => ProjectResource::make($project),

        ], Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function getProjects(Request $request)
    {
        $projects = Project::query()
            ->where('status', '=', (Status::ACTIVE)->value)
            ->paginate($request->limit);
        return ProjectResource::collection($projects);
    }


    public function getProject(string $slug)
    {
        $project = Project::query()->where('slug', '=', $slug)->firstOrFail();
        return ProjectResource::make($project);
    }
}
