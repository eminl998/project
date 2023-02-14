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
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                          </div>
                          
                          <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" cols="5" rows="5">{{ old('description') }}</textarea>
                          </div>
                          
                          <div>
                            <select name="task_level" class="form-control">
                              <option disabled> Task Level</option>
                              <option value="urgent" {{ old('task_level') == 'urgent' ? 'selected' : '' }}>Urgent</option>
                              <option value="medium" {{ old('task_level') == 'medium' ? 'selected' : '' }}>Medium</option>
                              <option value="low" {{ old('task_level') == 'low' ? 'selected' : '' }}>Low</option>
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
 