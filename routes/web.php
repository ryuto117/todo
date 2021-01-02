<?php

use Illuminate\Support\Facades\Route;

//コントローラを使うときはここに記述
use App\Http\Controllers\TaskController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\API\VerController;


Route::group(['middleware' => 'auth'], function() {


   Route::get('/', [HomeController::class,'index'])->name('home');

      Route::get('/folders/create', [FolderController::class,'showCreateForm'])->name('folders.create');
      Route::post('/folders/create', [FolderController::class,'create']);

      Route::group(['middleware' => 'can:view,folder'], function() {
         Route::get('/folders/{folder}/tasks',[TaskController::class,'index'])->name('tasks.index');

         Route::get('/folders/{folder}/tasks/create', [TaskController::class,'showCreateForm'])->name('tasks.create');
         Route::post('/folders/{folder}/tasks/create', [TaskController::class,'create']);

         Route::get('/folders/{folder}/tasks/{task}/edit', [TaskController::class,'showEditForm'])->name('tasks.edit');
         Route::post('/folders/{folder}/tasks/{task}/edit', [TaskController::class,'edit']);

         Route::get('ver',[API\VerController::class,'index']);

      });
   });


Auth::routes();

//私の目的：Sendgridを利用するためにFromの変更
//そのためにはWeb APIで送信かstmpで送信するかの2択
//Web APIで送信する場合は、https://www.internetacademy.jp/it/programming/javascript/how-to-use-web-api.html#chapter3
//STMPの場合は、固定文字列「apikey」をBASE64エンコードした文字列が必要

?>

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
