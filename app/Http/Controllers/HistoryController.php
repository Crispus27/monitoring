<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\History;

class HistoryController extends Controller
{
    public function show($id)
    {
        $module = Module::with('histories')->findOrFail($id);
        $historyCount = History::where('module_id', $id)->count();
        $latestHistory = History::where('module_id', $id)->latest()->first();
        return view('module.show', compact('module','historyCount','latestHistory'));
    }
}
