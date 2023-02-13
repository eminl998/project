@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row justify-content-center">
        <div>
            <div class="card">
              <div class="card-header">{{ __('Your ToDos')}}</div> 

                <div class="card-body row justify-content-center" >

                  @if(Session::has('alert-success'))
                  <div class="alert alert-success" role="alert">
                    {{Session::get('alert-success')}}
                  </div>
                  @endif

                  @if(Session::has('alert-info'))
                  <div class="alert alert-info" role="alert">
                    {{Session::get('alert-info')}}
                  </div>
                  @endif


                  @if(Session::has('error'))
                  <div class="alert alert-danger" role="alert">
                    {{Session::get('error')}}
                  </div>
                  @endif
                <h6 class="d-flex justify-content">
  <form action="{{ route('todos.index') }}" method="get" class="form-inline">
    <input type="text" class="form-control mr-2" name="search" value="{{ request('search') }}" placeholder="Search">
    <select class="form-control mr-2" name="status">
      <option value="">All</option>
      <option value="is_completed" {{ request('status') == 'is_completed' ? 'selected' : '' }}>Completed</option>
      <option value="not_completed" {{ request('status') == 'not_completed' ? 'selected' : '' }}>Not Completed</option>
    </select>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</h6>

          
                  @if(!$todos->isEmpty())

                
                  <table class="bold-text">
                    <thead>
                        <tr class="bold-text">
                            <th>Title</th>
                            <th>Description</th>
                            <th>Task Level</th>
                            <th>Completed</th>
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
                  
                
                  
                  @else 
                
                  <h4>No todos created yet.</h4>

                  @endif

                <br>  
                <div class="row justify-centre">
                <a  href="{{route ('create')}}" class="btn btn-outline-dark ">Create ToDo</a>
                </div>
                    
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection



