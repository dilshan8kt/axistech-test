@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header flex items-right">
                    {{ __('Course') }}
                </div>

                <div class="card-body">
                    <div style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);transition: 0.3s;">
                        <div style="padding: 2px 16px;">
                          <h4><b>{{ $course->title }}</b></h4>
                          <p>{{ Str::words($course->description,3) }}</p>

                          @if (Auth::user()->isAdmin)
                            @foreach ($course->users as $user)
                                <li><b>{{ $user->name.' ('.$user->points().')' }}</b></li>
                            @endforeach
                              
                          @endif

                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
