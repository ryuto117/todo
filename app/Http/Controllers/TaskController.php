<?php

namespace App\Http\Controllers;

use App\Folder;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        //Folderのデータを$foldersに挿入
        $folders = Folder::all();

        return view('tasks/index',['folders'=>$folders,]);
    }
}
?>
