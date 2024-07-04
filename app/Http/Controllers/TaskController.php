<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;

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
    public function store(TaskRequest $request)
    {
      $data =$request->validated();
      /* $task = new Task;
       $task->title = $data['title'];
       $task->description = $data['description'];
       $task->long_description = $data['long_description'];
       $task->save();*/

       $task = Task::create($request->validated());
       return redirect()->route('tasks')->with('success','Task Created Successfully'); 
    }
    
    public function edit($id)
    {
        
        $task = Task::findOrFail($id);
        return view('edit',compact('task'));
    }
    public function update(TaskRequest $request, $id)
    {
       $data = $request->validated();
        
        $task = Task::findOrFail($id);
        $task->title = $data['title'];
        $task->description = $data['description'];
        $task->long_description = $data['long_description'];
        $task->save();
       return redirect()->route('tasks')->with('success','Task Updated Successfully');

    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('tasks')->with('success','Task Deleted Successfully');
    }
}
