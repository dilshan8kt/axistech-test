@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header flex items-right">
                    {{ __('New Course') }} 
                    </div>

                <div class="card-body">

                    <form action="{{ route('courses.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title"  placeholder="Course title...">
                            
                          </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description"  placeholder="Course description..."></textarea>
                            
                          </div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                    
            </div>
        </div>
    </div>
</div>
</div>
@endsection
