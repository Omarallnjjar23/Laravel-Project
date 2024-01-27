<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\OwnerController;
use Illuminate\Support\Facades\Auth;


Auth::routes();

Route::get('/', function () {
    if(auth()->user())
        if(auth()->user()->role == 'developer')
            return redirect('/' . auth()->user()->role . '/projects');
        else
            return redirect('/' . auth()->user()->role);
    else
        return view('index');
});


Route::middleware(['auth', 'CheckUserRole:owner'])->prefix('owner')->group(function () {
    Route::get('/',[OwnerController::class,'index']);
    Route::get('profile', [OwnerController::class,'showProfile']);
    Route::get('systems/search', [OwnerController::class, 'searchSystems']);
    Route::get('systems/{id}', [OwnerController::class,'systemDetails']);
    Route::get('show-requests',[OwnerController::class,'showRequests']);
    Route::get('create-request',[OwnerController::class,'createRequest']);
    Route::post('store-request',[OwnerController::class,'storeRequest']);
    Route::get('enhance-request/{id}',[OwnerController::class,'enhanceRequest']);
    Route::post('store-enhance-request/{id}',[OwnerController::class,'storeEnhanceRequest']);
    Route::get('delete-request/{id}',[OwnerController::class,'deleteRequest']);
});

Route::middleware(['auth', 'CheckUserRole:manager'])->prefix('manager')->group(function () {
    Route::get('/',[ManagerController::class,'index']);
    Route::get('profile', [ManagerController::class,'showProfile']);
    Route::get('requests/{id}',[ManagerController::class,'requestDetails']);
    Route::get('projects', [ManagerController::class,'showProjects']);
    Route::get('projects/search', [ManagerController::class, 'searchProjects']);
    Route::get('projects/{id}', [ManagerController::class,'projectDetails']);
    Route::get('create-project/{id}',[ManagerController::class,'createProject']);
    Route::post('store-project/{id}', [ManagerController::class,'storeProject']);
    Route::get('projects/{id}/progress', [ManagerController::class,'showProgress']);
    Route::get('approve-project/{id}', [ManagerController::class,'approveProject']);
    Route::get('projects/{id}/edit', [ManagerController::class,'editProject']);
    Route::post('update-project/{id}', [ManagerController::class,'updateProject']);
});

Route::middleware(['auth', 'CheckUserRole:developer'])->prefix('developer')->group(function () {
    Route::get('/projects',[DeveloperController::class,'index']);
    Route::get('profile', [DeveloperController::class,'showProfile']);
    Route::get('projects/search', [DeveloperController::class, 'searchProjects']);
    Route::get('projects/{id}',[DeveloperController::class,'projectDetails']);
    Route::get('projects/{id}/progress',[DeveloperController::class,'showProgress']);
    Route::get('projects/{id}/progress/create',[DeveloperController::class,'createProgress']);
    Route::post('projects/{id}/progress/store',[DeveloperController::class,'storeProgress']);
});