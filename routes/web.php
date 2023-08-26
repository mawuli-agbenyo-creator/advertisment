<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\advertisment;
use App\Http\Controllers\ProfileController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/test', function () {
    return view('test');
});

// Route::get('/project', function () {
//     return view('project-detail');
// });

// Route::get('/p', function () {
//     return view('project');
// });


// Route::get('/user/project', function () {
//     return view('userproject');
// });

Route::get('/user/project/view', function () {
    return view('userview');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'User'])->group(function () {
    Route::get('/dashboard', [advertisment::class, 'Dashboard'])->name('dashboard');
    Route::post('/dashboard/data', [advertisment::class, 'DashboardData'])->name('DashboardData');
    Route::get('/dashboard/project', [advertisment::class, 'project'])->name('project');
    Route::get('/dashboard/project/{view}/view', [advertisment::class, 'view'])->name('view');
    Route::get('/dashboard/project/{view}/del', [advertisment::class, 'del'])->name('del');
});

Route::middleware(['auth', 'Admin'])->group(function () {
   
});

require __DIR__.'/auth.php';
