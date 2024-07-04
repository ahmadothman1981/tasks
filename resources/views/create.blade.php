@extends('layouts.app')

@section('title','Add Task')

@section('styles')
<style>
    .error-message{
        color: red;
        font-size: 0.8rem;
    }
</style>
@endsection
@section('content')
<form action="{{route('task.store')}}" method="POST">
    @csrf
    @method('POST')
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{old('title')}}">
        @error('title')
        <p class="error-message">{{$message}}</p>
        @enderror
    </div>
    <div>
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10">{{old('description')}}</textarea>
        @error('description')
        <p class="error-message">{{$message}}</p>
        @enderror
    </div>
    <div>
        <label for="long_description">Long Description</label>
        <textarea name="long_description" id="long_description" cols="30" rows="10">{{old('long_description')}}</textarea>
        @error('long_description')
        <p class="error-message">{{$message}}</p>
        @enderror
    </div>
    <div>
        <button type="submit">Add Task</button>
</form>
@endsection