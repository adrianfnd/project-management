<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use App\Models\Sbu;
use App\Models\Status;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $page_name = 'Projects';

        $projects = Project::with(['type', 'sbu', 'status', 'technician'])->paginate(10);

        return view('superadmin.project.index', compact('page_name', 'projects'));
    }

    public function create()
    {
        $page_name = 'Create Project';

        $types = Type::all();
        $sbus = Sbu::all();
        $statuses = Status::all();
        $technicians = User::where('role_id', Role::where('role_name', 'TECHNICIAN')->first()->id)->get();

        return view('superadmin.project.create', compact('page_name', 'types', 'sbus', 'statuses', 'technicians'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type_id' => 'required|exists:types,id',
            'project_name' => 'required',
            'olt_hostname' => 'required',
            'no_sp2k_spa' => 'required',
            'sbu_id' => 'required|exists:sbus,id',
            'kendala' => 'nullable',
            'progress' => 'nullable',
            'status_id' => 'required|exists:statuses,id',
            'start_date' => 'required|date',
            'target' => 'required|date',
            'end_date' => 'nullable|date',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'radius' => 'nullable',
            'link_file' => 'nullable|file|mimes:pdf|max:10240',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'is_active' => 'required|in:Y,N',
            'technician_id' => 'required|exists:users,id',
        ], [
            'type_id.required' => 'Tipe proyek wajib diisi.',
            'project_name.required' => 'Nama proyek wajib diisi.',
            'olt_hostname.required' => 'OLT hostname wajib diisi.',
            'no_sp2k_spa.required' => 'Nomor SP2K/SPA wajib diisi.',
            'sbu_id.required' => 'SBU wajib diisi.',
            'status_id.required' => 'Status wajib diisi.',
            'start_date.required' => 'Tanggal mulai wajib diisi.',
            'target.required' => 'Tanggal target wajib diisi.',
            'is_active.required' => 'Status aktif wajib diisi.',
            'technician_id.required' => 'Teknisi wajib diisi.',
        ]);

        $project = new Project();
        $project->type_id = $request->type_id;
        $project->project_name = $request->project_name;
        $project->olt_hostname = $request->olt_hostname;
        $project->no_sp2k_spa = $request->no_sp2k_spa;
        $project->sbu_id = $request->sbu_id;
        $project->kendala = $request->kendala;
        $project->progress = $request->progress;
        $project->status_id = $request->status_id;
        $project->start_date = $request->start_date;
        $project->target = $request->target;
        $project->end_date = $request->end_date;
        $project->latitude = $request->latitude;
        $project->longitude = $request->longitude;
        $project->radius = $request->radius;
        $project->link_file = null;
        $project->images = null;
        $project->is_active = $request->is_active;
        $project->technician_id = $request->technician_id;
        $project->created_by = auth()->id();
        $project->save();

        if ($request->hasFile('link_file')) {
            $file = $request->file('link_file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('pengajuan' . '/' . $project->project_name . '/', $fileName, 'public');
        }
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('gambar project/' . $project->project_name, 'public');
                $imagePaths[] = $path;
            }
        }
        $project->update([
            'link_file' => $project->link_file,
            'images' => json_encode($imagePaths),
        ]);

        return redirect()->route('project.index')->with('success', 'Project created successfully');
    }

    public function edit($id)
    {
        $page_name = 'Edit Project';

        $project = Project::findOrFail($id);
        $types = Type::all();
        $sbus = Sbu::all();
        $statuses = Status::all();
        $technicians = User::where('role_id', Role::where('role_name', 'TECHNICIAN')->first()->id)->get();

        return view('superadmin.project.edit', compact('page_name', 'project', 'types', 'sbus', 'statuses', 'technicians'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'type_id' => 'required|exists:types,id',
            'project_name' => 'required',
            'olt_hostname' => 'required',
            'no_sp2k_spa' => 'required',
            'sbu_id' => 'required|exists:sbus,id',
            'kendala' => 'nullable',
            'progress' => 'nullable',
            'status_id' => 'required|exists:statuses,id',
            'start_date' => 'required|date',
            'target' => 'required|date',
            'end_date' => 'nullable|date',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'radius' => 'nullable',
            'link_file' => 'nullable|file|mimes:pdf|max:10240',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'is_active' => 'required|in:Y,N',
            'technician_id' => 'required|exists:users,id',
        ], [
            'type_id.required' => 'Tipe proyek wajib diisi.',
            'project_name.required' => 'Nama proyek wajib diisi.',
            'olt_hostname.required' => 'OLT hostname wajib diisi.',
            'no_sp2k_spa.required' => 'Nomor SP2K/SPA wajib diisi.',
            'sbu_id.required' => 'SBU wajib diisi.',
            'status_id.required' => 'Status wajib diisi.',
            'start_date.required' => 'Tanggal mulai wajib diisi.',
            'target.required' => 'Tanggal target wajib diisi.',
            'is_active.required' => 'Status aktif wajib diisi.',
            'technician_id.required' => 'Teknisi wajib diisi.',
        ]);
    
        $project = Project::findOrFail($id);
        $project->type_id = $request->type_id;
        $project->project_name = $request->project_name;
        $project->olt_hostname = $request->olt_hostname;
        $project->no_sp2k_spa = $request->no_sp2k_spa;
        $project->sbu_id = $request->sbu_id;
        $project->kendala = $request->kendala;
        $project->progress = $request->progress;
        $project->status_id = $request->status_id;
        $project->start_date = $request->start_date;
        $project->target = $request->target;
        $project->end_date = $request->end_date;
        $project->latitude = $request->latitude;
        $project->longitude = $request->longitude;
        $project->radius = $request->radius;
        $project->is_active = $request->is_active;
        $project->technician_id = $request->technician_id;
        $project->updated_by = auth()->id();
    
        if ($request->hasFile('link_file')) {
            if ($project->link_file) {
                Storage::disk('public')->delete($project->link_file);
            }
            $file = $request->file('link_file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('pengajuan' . '/' . $project->project_name . '/', $fileName, 'public');
            $project->link_file = $filePath;
        }
    
        if ($request->hasFile('images')) {
            if ($project->images) {
                $oldImages = json_decode($project->images, true);
                foreach ($oldImages as $oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('gambar project/' . $project->project_name, 'public');
                $imagePaths[] = $path;
            }
            $project->images = json_encode($imagePaths);
        }
    
        $project->save();
    
        return redirect()->route('project.index')->with('success', 'Project updated successfully');
    }
    
    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        if ($project->link_file) {
            Storage::disk('public')->delete($project->link_file);
        }
    
        if ($project->images) {
            $images = json_decode($project->images, true);
            foreach ($images as $image) {
                Storage::disk('public')->delete($image);
            }
        }
    
        $project->delete();
    
        return redirect()->route('project.index')->with('success', 'Project deleted successfully');
    }
}