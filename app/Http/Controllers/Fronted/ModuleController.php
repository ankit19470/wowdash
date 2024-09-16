<?php

namespace App\Http\Controllers\fronted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Module;

class ModuleController extends Controller
{
    public function index()
    {
        return view('fronted.add-module'); // Ensure this view exists
    }

    public function store(Request $request)
    {
        $request->validate([
            'module' => 'required|string|max:255|unique:modules,module',
        ]);

        // Using Module model to create the module
        Module::create(['module' => $request->module]);

        return redirect()->route('permissions.index')->with('success', 'Module added successfully!');
    }
}
