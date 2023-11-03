<?php

use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    $user = request('user');
    // return view('landing', ['user' => $user]);
    // PatientController::landing($user);
    return view('patient_info');
});

Route::post('/addPatient', '\App\Http\Controllers\PatientController@addPatientDetails')->name('patient.add');
