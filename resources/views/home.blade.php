@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                </div>
                
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
    
    <a href="{{route ('todos.index')}}" class="btn btn-outline-dark your-class-left">See Your ToDos</a>
    <a href="{{route ('create')}}" class="btn btn-outline-dark your-class-right">Create ToDo</a>
        </div>
    </div>
</div>

@endsection
