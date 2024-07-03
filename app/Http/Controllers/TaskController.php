<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('index',compact('tasks'));
    }

    public function show($id)
    {
        $task= Task::findOrFail($id);
        return view('show',compact('task'));
    }
}