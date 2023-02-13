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

                  <div class="col-md-4 float-right">
                    <form action="{{route('search')}}" method="GET" role="search">
                    @csrf
                      <input type="text" name="search" class="form-control" placeholder="Search Todos" required/> 
                    </form>
                    
                  </div> 
          
                  @if(!$todos->isEmpty())

                  @if($todos->isNotEmpty())
                    @foreach ($todos as $todo)
                      <div class="">
                        <p>{{$todo->title}}</p>
                      </div>
                    @endforeach
                  @else
                      <div>
                        <h2>No Todos found</h2>
                      </div>
                   @endif   
                  
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

                <br>  <a  href="{{route ('create')}}" class="btn btn-outline-dark ">Create ToDo</a>
                    
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection



