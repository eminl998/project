@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Your TO DO') }}</div>
                <div class="card-body">
                        
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                    <form method="POST" action="{{route('store')}}">
                        @csrf
                        <div class="mb-3">
                          <label class="form-label">Title</label>
                          <input type="text" name="title" class="form-control">
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Description</label>
                         <textarea name="description" class="form-control"  cols="5" rows="5"></textarea>
                        </div>
                        <div>
                            <select name="task_level" class="form-control">
                                <option disabled selected> Task Level</option>
                                <option value="2">Urgent</option>
                                <option value="1">Medium</option>
                                <option value="0">Low</option>
                            </select>
                        </div> <br>
                        <button type="submit" class="btn btn-primary">Submit</button>

                        @if (session()->has('alert-success'))
                        <div class="alert alert-success">
                            {{ session()->get('alert-success') }}
                        </div>
                        @endif

                      </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 