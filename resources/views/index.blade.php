@extends('layouts.app')

@section('title','List Of Tasks')
@section('content')

    @forelse($tasks as $task)

    <div>
        <a href="{{route('task.show',$task->id)}}">{{$task->title}}</a>
    </div>
    @empty
    <div>There is No Tasks</div>
    @endforelse

    
    @endsection
