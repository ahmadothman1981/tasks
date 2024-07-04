@extends('layouts.app')

@section('title','List Of Tasks')
@section('content')
<nav class="mb-4">
    <a class="link" href="{{route('task.create')}}">Create Task</a>
</nav>
    @forelse($tasks as $task)

    <div>
        <a  href="{{route('task.show',$task->id)}}"
         @class(['line-through'=>$task->completed])>{{$task->title}}</a>
    </div>
    @empty
    <div>There is No Tasks</div>
    @endforelse

    @if($tasks->count())
    <nav class="mt-4">{{$tasks->links()}}</nav>
    @endif
    @endsection
