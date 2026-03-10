<?php

use App\Http\Controllers\EasterController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UtilController;
use App\Http\Controllers\UtilUsers;
use Dflydev\DotAccessData\Util;
use Illuminate\Support\Facades\Route;

Route::get('/', [UtilController::class, 'home'])->name(('Utils.home'));

Route::get('/hello', [UtilController::class, 'welcome'])->name(('Utils.welcome'));

Route::get('/turma/{course_name}', function($name){
    return "<h4>Ola turma $name </h4>";
});

Route::fallback([UtilController::class, 'fallback'])->name(('Utils.fall'));

Route::get('/adicionarUsers', [UtilUsers::class, 'addUsers'])->name(('Users.add'));
Route::get('/todosUsers',[UtilUsers::class,'todosUsers'])->name(('Users.todos'));
Route::get('/todasTarefas',[TaskController::class,'todasTarefas'])->name(('Tarefas.todos'));
Route::get('/view_user/{id}', [UtilUsers::class, 'viewUser'])->name(('users.view'));
Route::get('/deleteUser/{id}',[UtilUsers::class, 'deleteUser'])->name('users.delete');
Route::get('/view_tarefas/{id}',[TaskController::class,'viewTarefa'])->name('Tarefas.view');
Route::get('/deleteTasks/{id}',[TaskController::class,'deleteTarefa'])->name('Tarefas.delete');


Route::get('/tabelaeaster',[EasterController::class,'tabelaEaster'])->name('Easter.tabelaEaster');
Route::get('/deleteEaster/{id}',[EasterController::class,'deleteEaster'])->name('Easter.delete');
Route::get('/viewEaster/{id}',[EasterController::class,'viewEaster'])->name('Easter.view');

Route::post('/store-users',[UtilUsers::class,'storeUsers'])->name('users.store');
Route::post('/store-tasks',[TaskController::class,'storeTasks'])->name('tasks.store');
Route::get('/add_tasks',[TaskController::class,'addTarefas'])->name('tasks.add');
Route::get('/addEaster',[EasterController::class,'addEaster'])->name('Easter.add');
Route::post('/storeEaster',[EasterController::class,'storeEaster'])->name('Easter.store');
