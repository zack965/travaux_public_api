<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post("CreateProject", [ProjectController::class, "CreateProject"]);
Route::put("UpdateProject/{project_id}", [ProjectController::class, "UpdateProject"]);
Route::get("AllProjects", [ProjectController::class, "AllProjects"]);


Route::post("CreateArticle/{project_id}", [ArticleController::class, "CreateArticle"]);
Route::get("AllArticles", [ArticleController::class, "AllArticles"]);
Route::get("ArticlesOfProject/{project_id}", [ArticleController::class, "ArticlesOfProject"]);
