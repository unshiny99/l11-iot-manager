<?php

namespace App\Http\Controllers;

use App\Enums\ModuleStatus;
use App\Models\Module;
use App\Models\ModuleData;
use App\Models\ModuleLog;
use App\Models\ModuleType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class ModuleController extends Controller
{
    // Display a list of all modules
    public function index()
    {
        $modules = Module::all();
        return view('modules.index', compact('modules')); 
    }

    // Show a form to create a new module
    public function create()
    {
        $moduleTypes = ModuleType::all();
        $statuses = ModuleStatus::cases();

        return view('modules.create', [
            'module_types' => $moduleTypes,
            'statuses' => $statuses
        ]); 
    }

    // Store the newly created module
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'module_type_id' => 'required|integer',
            'status' => 'required|string'
        ]);

        $module = Module::create($validatedData);

        return redirect()->route('modules.index');
    }

    // Show a specific module
    public function show(int $id): View
    {
        $module = Module::findOrFail($id);
        $moduleData = ModuleData::where('module_id', $id)->orderBy('created_at', 'asc')->get();
        $moduleLogs = ModuleLog::where('module_id', $id)->orderBy('created_at', 'asc')->get();

        return view('modules.show', [
            'module'     => $module, 
            'moduleData' => $moduleData,
            'moduleLogs' => $moduleLogs
        ]);
    }

    // Update module status (example)
    public function updateStatus(Request $request, int $id)
    {
        $module = Module::findOrFail($id);
        $module->status = $request->input('status', ModuleStatus::ACTIVE);
        $module->save();

        return redirect()->back();
    }

    // Delete a module (example)
    public function destroy(int $id): RedirectResponse
    {
        $module = Module::findOrFail($id);
        $module->delete();

        return redirect()->route('modules.index');
    }
}
