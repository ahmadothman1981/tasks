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
    public function store(Request $request)
    {
      $data = $request->validate([
           'title'=>'required|max:255',
           'description'=>'required',
           'long_description'=>'required',
       ]);

       $task = new Task;
       $task->title = $data['title'];
       $task->description = $data['description'];
       $task->long_description = $data['long_description'];
       $task->save();
       return redirect()->route('tasks')->with('success','Task Created Successfully'); 
    }
}
