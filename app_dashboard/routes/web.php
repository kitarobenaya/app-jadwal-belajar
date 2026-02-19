<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudyDayController;
use App\Http\Controllers\StudyListController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SessionController;


Route::middleware(['guest'])->group(function () {
    // Auth route

    Route::get('/register', [RegisterController::class, 'create'])
    ->name('register');
    Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');

    Route::get('/login', [SessionController::class, 'create'])
    ->name('login');
    Route::post('/login', [SessionController::class, 'store'])
    ->name('login.store');
});


Route::middleware(['auth'])->group(function() {
    // Study Day Route

    // show the dashboard thing (index)
    Route::get('/study-day', [StudyDayController::class, 'index'])
    ->name('dashboard.study-day');
    // show add study day form (create)
    Route::get('/study-day/add-study-day', [StudyDayController::class, 'create'])
    ->name('dashboard.form-study-day');
    // add new study day (store)
    Route::post('/study-day/add-study-day', [StudyDayController::class, 'store'])
    ->name('dashboard.store-study-day');
    // show edit study day form (edit)
    Route::get('/study-day/edit-study-day/{studyDay}', [StudyDayController::class, 'edit'])
    ->name('dashboard.form_edit-study-day');
    // update the study day (update)
    Route::patch('/study-day/update-study-day/{studyDay}', [StudyDayController::class, 'update'])
    ->name('dashboard.update-study-day');
    // delete the study day (destroy)
    Route::delete('/study-day/delete-study-day/{studyDay}', [StudyDayController::class, 'destroy'])
    ->name('dashboard.delete-study-day');


    // Study List route

    // show study list (index)
    Route::get('/study-list/{studyDayId}', [StudyListController::class, 'show'])
    ->name('dashboard.study-list'); 
    // show add study list form (create)
    Route::get('/study-list/add-study-list/{studyDayId}', [StudyListController::class, 'create'])
    ->name('dashboard.form-study-list');
    // add new study list (store)
    Route::post('/study-list/add-study-list', [StudyListController::class, 'store'])
    ->name('dashboard.store-study-list');
    // show edit study list form (edit)
    Route::get('/study-list/edit-study-list/{studyDayId}', [StudyListController::class, 'edit'])
    ->name('dashboard.form_edit-study-list');
    // update the study list (update)
    Route::patch('/study-list/update-study-list/{studyDayId}', [StudyListController::class, 'update'])
    ->name('dashboard.update-study-list');
    // delete the study list (destroy)
    Route::delete('/study-list/delete-study-list/{studyDayId}', [StudyListController::class, 'destroy'])
    ->name('dashboard.delete-study-list');


    Route::post('/logout', [SessionController::class, 'destroy'])
    ->name('logout');
});
