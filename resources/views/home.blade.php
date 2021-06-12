@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Courses') }}</div>

                <div class="card-body">
                    @foreach ($courses as $course)
                        <div style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);transition: 0.3s;">
                            <div style="padding: 2px 16px;">
                              <h4><b>{{ $course->title }}</b></h4>
                              <p>{{ Str::words($course->description,3) }}</p>

                              @if (Auth::user()->isAdmin)
                                @foreach ($course->users as $user)
                                    <li><b>{{ $user->name }}</b></li>
                                @endforeach
                                  
                              @endif

                            </div>
                          </div>
                          <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
