@extends('layouts.app')
@section('content')
   <h1>Edit Events</hi>

   <form method="POST" action="/task/{{$task->id}}">
     {{method_field('PATCH')}}
     {!! csrf_field() !!}
     <div class="form-group">

       <textarea name="name" class="form-control">{{$task->name}}</textarea>
     </div>
     <div class="form-group">
       <button type="submit" class="btn btn-primary">Updated Event</button>
       <a class="btn btn-primary" href="/tasks" role="button">Back to Tasks</a>

     </div>
  </form>
  @stop
