@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if  (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                     
                    <b>Title :</b> {{$todo->title}}<br>
                    <b>Description :</b> {{$todo->description}}<br>
                    {{-- <b>Task Level :</b>{{$todo->task_level}}<br> --}}
                    <b>Task Level :</b>
                        @if ($todo->task_level === 0)
                        Low
                        @elseif ($todo->task_level === 1)
                        Medium
                        @elseif ($todo->task_level === 2)
                        Urgent
                        @endif
                        <br>
                        <b>Completed :</b> {{ $todo->is_completed ? 'Yes' : 'No' }} <br>

                    
                    
                    <br>
                    <br>
                    <tr>
                    <a href="{{url()->previous()}}" class="btn btn-sm btn-outline-dark">Go Back</a>
                    <a class="btn btn-sm btn-outline-success" href="{{route('todos.edit', $todo->id)}}">Edit</a>
                        
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
