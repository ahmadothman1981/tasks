<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\UpdateTaskRequest;

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
            $task= Task::find($id);
            return view('show',compact('task'));
        }
        catch(\Throwable $exception){
    
            Log::error(message:" can't Show Task : System can't  Show Task ".$exception->getMessage());
            abort(500);
         }
       
        
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
       return redirect()->route('tasks')->with('success','Task Created Successfully');
    }
    catch(\Throwable $exception){
    
        Log::error(message:" can't Store Task : System can't  store Task ".$exception->getMessage());
        abort(500);

     }
     
        
    }
    
    public function edit($id)
    {
        try{
            $task = Task::find($id);
            return view('edit',compact('task'));
        }
        catch(\Throwable $exception){
    
            Log::error(message:" can't Edit Task : System can't  Edit Task ".$exception->getMessage());
            abort(500);
        }
        
       
    }
    public function update(UpdateTaskRequest $request, $id)
    {
        try{
       $data = $request->validated();
        
        $task = Task::find($id);
        $task->title = $data['title'];
        $task->description = $data['description'];
        $task->long_description = $data['long_description'];
        $task->save();
        return redirect()->route('tasks')->with('success','Task Updated Successfully');
        }
        catch(\Throwable $exception){
    
            Log::error(message:" can't update Task : System can't  update Task ".$exception->getMessage());
            abort(500);
    
         }
       

    }

    public function destroy($id)
    {
        try{
        $task = Task::find($id);
        $task->delete();
        return redirect()->route('tasks')->with('success','Task Deleted Successfully');
        }
        catch(\Throwable $exception){
    
            Log::error(message:" can't delete Task : System can't  delete Task ".$exception->getMessage());
            abort(500);
    
         }
        
    }

    public function complete($id)
    {
        try{
        $task = Task::find($id);
        $task->completed = !$task->completed;
        $task->save();
        return redirect()->back()->with('success','Task Updated Successfully');

        }
        catch(\Throwable $exception){
    
            Log::error(message:" can't update completed Task : System can't  update completed task Task ".$exception->getMessage());
            abort(500);
    
         }
    }
}
