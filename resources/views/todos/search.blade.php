@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Search results for "{{ $query }}"</h3><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Task Level</th>
                    <th>Is Completed</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($todos as $todo)
                    <tr>
                                <td>{{substr($todo->title,0,15).(strlen($todo->title)>15 ? '...' : '')}}</td>
                                <td>{{ substr($todo->description, 0, 20) . (strlen($todo->description) > 20 ? '...' : '') }}</td>
                              
                                <td>
                                  @if($todo->task_level == 0)
                                  <span class="text-success">Low</span>
                                  @elseif($todo->task_level == 1)
                                  <span class="text-warning">Medium</span>
                                  @elseif($todo->task_level == 2)
                                  <span class="text-danger">Urgent</span>
                                  @endif
                                </td>
                                {{-- <td>{{$todo->is_completed}}</td> --}}
                                <td>
                                  @if($todo->is_completed == 0)
                                      Is not Completed
                                  @elseif($todo->is_completed == 1)
                                      Is Completed
                                  
                                  @endif
                                </td>
                                
                                <td>
                                  <a class="btn btn-outline-primary" href="{{route('todos.show', $todo->id)}}">View</a>
                                  <a class="btn btn-outline-success" href="{{route('todos.edit', $todo->id)}}">Edit</a>
                                  <a class="btn btn-danger" href="#"
                                    onclick="if (confirm('Are you sure to delete?')) { 
                                               event.preventDefault(); 
                                               document.getElementById('delete-form-{{$todo->id}}').submit(); 
                                             }">
                                    Delete
                                  </a>
                                  <form id="delete-form-{{$todo->id}}" action="{{route('destroy', $todo->id)}}" method="POST" style="display: none;">
                                    
                                    @method('DELETE')
                                  </form>
                                </td>
                                
                            </tr>
                @endforeach
                
            </tbody>
        </table>
        <a href="{{url()->previous()}}" class="btn btn-sm btn-outline-dark">Go Back</a>
    </div>
@endsection
