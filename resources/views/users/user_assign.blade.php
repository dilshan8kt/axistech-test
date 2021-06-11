@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header flex items-right">
                    {{ __('Assign Users') }} 
                </div>

                <div class="card-body">

                    <div style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                        transition: 0.3s;">
                            <div style="padding: 2px 16px;">
                              <h4><b>{{ $user->name }}</b></h4>
                              <p>{{ $user->email }}</p>
                            </div>
                          </div>
                          <br>

                    <form action="{{ route('users.update',$user->id) }}" method="post">
                        @csrf
                        @method('put')
                        
                        @foreach ($courses as $course)
                            <address>
                                <input name="courses[]" type="checkbox" value="{{ $course->id }}"  > {{$course->title}}
                            </address>
                        @endforeach


                          <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
