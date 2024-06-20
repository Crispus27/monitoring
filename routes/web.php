<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\ModuleController;
use App\Http\Controllers\HistoryController;
use App\Events\ModuleStatusChanged;
use App\Models\Module;
/* Route::get('/', function () {
    return view('welcome');
}); */
Route::get('/', [ModuleController::class, 'index'])->name('modules.index');

Route::resource('modules', ModuleController::class);
Route::get('modules/{id}/data', [HistoryController::class, 'show'])->name('modules.data');


Route::get('/test-event', function() {
    $module = Module::first(); // Obtenez un module existant pour le test
    event(new ModuleStatusChanged($module));
    return 'Événement envoyé';
});
