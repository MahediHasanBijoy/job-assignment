@extends('layout.app')

@section('content')
<div class="row m-3">
    <div class="card mx-auto mt-5  col-md-8">
        <div class="card-body">
            <h2 class="card-title text-center">Todo List</h2>
            <form action="{{ route('task.store')}}" method="post" class="my-3">
                @csrf
                <div class="form-group">
                    <label for="task" class="form-label">Task</label>
                    <input type="text" name="task" class="form-control" placeholder="Enter your task" >
                    @error('task')
                        <p class="text-danger m-0 py-2">{{$message}}</p>    
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary my-2">Add</button>
            </form>
            <div class="row">
              <h3 class="text-secondary">#Task Lists</h3>
              <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="col-8">Task</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sl = 1;
                        @endphp
                        @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $sl++ }}</td>
                            <td>{{ $task->task}}</td>
                            <td>
                                <a href="{{route('task.edit', $task->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{$task->id}}">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>
  
  <!-- Delete Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure to delete this task!
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <form id="deleteForm" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        </div>
      </div>
    </div>
  </div>
  
</div>


<script>
     document.addEventListener('DOMContentLoaded', function () {
            var deleteModal = document.getElementById('deleteModal');
            
            if (deleteModal) {
                deleteModal.addEventListener('show.bs.modal', function (event) {
                    var button = event.relatedTarget; // Button that triggered the modal
                    var itemId = button.getAttribute('data-id'); // Extract item ID from data-id attribute
                    var modal = this;
                    
                    modal.querySelector('#deleteForm').setAttribute('action', '/task/' + itemId); // Update form action
                });
            }
        });
</script>
@endsection