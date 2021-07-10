<?php



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('/doctor')->namespace('Doctor')->group(function() {
    Route::match(['get', 'post'], '/', [App\Http\Controllers\Doctor\DoctorController::class,'login']);
    Route::group(['middleware'=>['doctor']], function (){
        Route::get('/dashboard', [App\Http\Controllers\Doctor\DoctorController::class,'dashboard']);
        Route::get('/add-slot',[\App\Http\Controllers\Doctor\SlotController::class,'addSlot']);
        Route::post('/save-slot',[\App\Http\Controllers\Doctor\SlotController::class,'saveSlot']);
        Route::get('/slots',[\App\Http\Controllers\Doctor\SlotController::class,'index']);
        Route::get('/update-slot/{id}', [\App\Http\Controllers\Doctor\SlotController::class,'updateSlot']);
        Route::post('/edit-slot/{id}', [\App\Http\Controllers\Doctor\SlotController::class,'editSlot']);
        Route::get('/delete-slot/{id}', [\App\Http\Controllers\Doctor\SlotController::class,'deleteSlot']);
        Route::get('/logout', [\App\Http\Controllers\Doctor\DoctorController::class,'logout']);
    });
});
