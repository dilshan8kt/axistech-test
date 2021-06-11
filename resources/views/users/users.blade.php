@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header flex items-right">
                    {{ __('Users') }} 
                </div>

                <div class="card-body">
                    <table style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Point</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    {{ $user->points() }}
                                </td>
                                <td>
                                        
                                    <a href="{{ route('course.assign',$user->id) }}" class="btn btn-info">Assign Courses</a>
                               
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
