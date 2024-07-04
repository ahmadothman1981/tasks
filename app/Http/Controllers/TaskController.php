<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::latest()->paginate(7);
        return view('index',compact('tasks'));
    }

    public function show($id)
    {
        try{
            $task= Task::findOrFail($id);
        }
        catch(\Throwable $exception){
    
            Log::error(message:" can't Show Task : System can't  Show Task ".$exception->getMessage());
            abort(500);
         }
       
        return view('show',compact('task'));
    }
    public function store(TaskRequest $request)
    {
        try{
      $data =$request->validated();
      /* $task = new Task;
       $task->title = $data['title'];
       $task->description = $data['description'];
       $task->long_description = $data['long_description'];
       $task->save();*/

       $task = Task::create($request->validated());
    }
    catch(\Throwable $exception){
    
        Log::error(message:" can't Store Task : System can't  store Task ".$exception->getMessage());
        abort(500);

     }
     
       return redirect()->route('tasks')->with('success','Task Created Successfully'); 
    }
    
    public function edit($id)
    {
        try{
            $task = Task::findOrFail($id);
        }
        catch(\Throwable $exception){
    
            Log::error(message:" can't Edit Task : System can't  Edit Task ".$exception->getMessage());
            abort(500);
        }
        
        return view('edit',compact('task'));
    }
    public function update(TaskRequest $request, $id)
    {
        try{
       $data = $request->validated();
        
        $task = Task::findOrFail($id);
        $task->title = $data['title'];
        $task->description = $data['description'];
        $task->long_description = $data['long_description'];
        $task->save();
        }
        catch(\Throwable $exception){
    
            Log::error(message:" can't update Task : System can't  update Task ".$exception->getMessage());
            abort(500);
    
         }
       return redirect()->route('tasks')->with('success','Task Updated Successfully');

    }

    public function destroy($id)
    {
        try{
        $task = Task::findOrFail($id);
        $task->delete();
        }
        catch(\Throwable $exception){
    
            Log::error(message:" can't delete Task : System can't  delete Task ".$exception->getMessage());
            abort(500);
    
         }
        return redirect()->route('tasks')->with('success','Task Deleted Successfully');
    }

    public function complete($id)
    {
        try{
        $task = Task::findOrFail($id);
        $task->completed = !$task->completed;
        $task->save();
        }
        catch(\Throwable $exception){
    
            Log::error(message:" can't update completed Task : System can't  update completed task Task ".$exception->getMessage());
            abort(500);
    
         }
        return redirect()->back()->with('success','Task Updated Successfully');
    }
}
