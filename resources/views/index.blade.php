@extends('layouts.app')

@section('title','List Of Tasks')
@section('content')
<div>
    <a href="{{route('task.create')}}">Create Task</a>
</div>
    @forelse($tasks as $task)

    <div>
        <a href="{{route('task.show',$task->id)}}">{{$task->title}}</a>
    </div>
    @empty
    <div>There is No Tasks</div>
    @endforelse

    @if($tasks->count())
    <nav>{{$tasks->links()}}</nav>
    @endif
    @endsection
