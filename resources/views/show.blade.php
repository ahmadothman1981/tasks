@extends('layouts.app')

@section('title',$task->title)

@section('content')
<div class="mb-4">
<a class="link" href="{{route('tasks')}}">Go Back</a>

</div>

<p class="mb-4 text-slate-700">{{$task->description}}</p>

@if($task->long_description)
<p class="mb-4 text-slate-700">{{$task->long_description}}</p>
@endif

<p class="mb-4 text-sm text-slate-500">Created:{{$task->created_at->diffForHumans()}}</p>
<p class="mb-4 text-sm text-slate-500">Updated:{{$task->updated_at->diffForHumans()}}</p>

<p class="mb-4">
    @if($task->completed)
    <span class="font-medium text-green-500">completed</span>
    @else
    <span class="font-medium text-red-500">Not completed</span>
    @endif
</p>
<div class="flex gap-2">
    <a href="{{route('task.edit',$task->id)}}" class="btn">Edit</a>

    <form action="{{route('task.complete',$task->id)}}" method="post">
    @csrf
    @method('PUT')
    <button class="btn" type="submit">Mark as {{$task->completed ? 'Not completed' : '  completed'}}</button>
    </form>

    <form action="{{route('task.destroy',$task->id)}}" method="post">
    @csrf
    @method('DELETE')
    <button class="btn" type="submit">Delete</button>
    </form>
</div>
@endsection