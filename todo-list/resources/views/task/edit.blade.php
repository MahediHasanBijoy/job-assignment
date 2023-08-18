@extends('layout.app')

@section('content')
<div class="row m-3">
    <div class="card mx-auto mt-5  col-md-8">
        <div class="card-body">
            <h2 class="card-title text-center">Todo List</h2>
            <form action="{{ route('task.update', $task->id)}}" method="post" class="m-2">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="task" class="form-label">Edit Task</label>
                    <input type="text" name="task" class="form-control" placeholder="Enter your task" value="{{$task->task}}">
                    @error('task')
                        <p class="text-danger m-0 py-2">{{$message}}</p>    
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary my-2">Update</button>
            </form>
        </div>

    </div>
  
</div>
@endsection