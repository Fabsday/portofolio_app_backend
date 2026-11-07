<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    private const CATEGORIES = ['Mobile App', 'Website', 'Sistem Informasi', 'UI/UX', 'Java', 'Lainnya'];
    private const TECHNOLOGIES = ['Flutter', 'Laravel', 'React', 'Node.js', 'Python', 'Java', 'PHP'];

    private function rules(): array
    {
        return [
            'name'        => ['required', 'string', 'max:60'],
            'category'    => ['required', Rule::in(self::CATEGORIES)],
            'technology'  => ['required', Rule::in(self::TECHNOLOGIES)],
            'stack'       => ['nullable', 'string', 'max:255'],
            'year'        => ['required', 'integer', 'between:2000,' . date('Y')],
            'description' => ['required', 'string', 'min:10'],
        ];
    }

    public function index(Request $request)
    {
        $query = Project::query();
        if ($request->filled('technology')) {
            $query->where('technology', $request->technology);
        }
        return response()->json($query->orderByDesc('year')->orderByDesc('id')->get());
    }

    public function store(Request $request)
    {
        $project = Project::create($request->validate($this->rules()));
        return response()->json($project, 201);
    }

    public function show(Project $project)
    {
        return response()->json($project);
    }

    public function update(Request $request, Project $project)
    {
        $project->update($request->validate($this->rules()));
        return response()->json($project);
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return response()->json(['message' => 'Karya dihapus']);
    }
}