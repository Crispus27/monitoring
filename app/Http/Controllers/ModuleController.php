<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Module;

class ModuleController extends Controller
{
    public function index()
    {
        $modules = Module::all();
        return view('module.index', compact('modules'));
    }

    public function create()
    {
        return view('module.create');
    }

    public function store(Request $request)
    {
        $Requestvalidated = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'description' => 'nullable',
        ]);

        Module::create($Requestvalidated);

        return redirect()->route('modules.index')
        ->with('success', 'Module ajouté avec succès.');
    }

    public function show (){

    }
}
