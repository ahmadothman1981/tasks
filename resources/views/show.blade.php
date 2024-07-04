@extends('layouts.app')

@section('title',$task->title)

@section('content')

<p>{{$task->description}}</p>

@if($task->long_description)
<p>{{$task->long_description}}</p>
@endif

<p>{{$task->created_at}}</p>
<p>{{$task->updated_at}}</p>

<p>
    @if($task->completed)
    completed
    @else
    Not completed
    @endif
</p>
<div>
    <a href="{{route('task.edit',$task->id)}}">Edit</a>
</div>
<div>
    <form action="{{route('task.complete',$task->id)}}" method="post">
    @csrf
    @method('PUT')
    <button type="submit">Mark as {{$task->completed ? 'Not completed' : '  completed'}}</button>
    </form>
</div>
<div>
    <form action="{{route('task.destroy',$task->id)}}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
    </form>
</div>
@endsection