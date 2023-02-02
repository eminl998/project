@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Your TO DO') }}</div>

                <div class="card-body">
                    <h4>Edit Form</h4>

                    <form method="POST" action="{{route('update', ['id' => $todo->id])}}">

                        @csrf
                        @method('PUT')
                        <input type="hidden" name="todo_id" value="{{$todo->id}}">
                        <div class="mb-3">
                          <label class="form-label">Title</label>
                          <input type="text" name="title" class="form-control" value="{{$todo->title}}">
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Description</label>
                         <textarea name="description" class="form-control" cols="5" rows="5">{{$todo->description}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Task Level</label>
                            <select name="task_level" class="form-control">
                                <option disabled selected> Select Option</option>
                                <option value="0" {{ $todo->task_level == 1 ? 'selected' : '' }}>Low</option>
                                <option value="1" {{ $todo->task_level == 2 ? 'selected' : '' }}>Medium</option>
                                <option value="2" {{ $todo->task_level == 3 ? 'selected' : '' }}>Urgent</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Status</label>
                            <select name="is_completed" class="form-control">
                                <option disabled selected> Select Option</option>
                                <option value="1">Completed</option>
                                <option value="0">Incompleted</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                     </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
