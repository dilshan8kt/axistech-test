@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header flex items-right">
                    {{ __('Courses') }}
                    
                    <a href="{{ route('courses.create') }}" class="btn btn-primary float-right" >Add New Course</a>
                   
                </div>

                <div class="card-body">
                    <table style="width: 100%;" class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th style="width: 200px;">Users</th>
                                <th>Date Time</th>
                                <th style="width: 100px;" colspan="3">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                            <tr>
                                <td>
                                    {{ $course->title }}
                                </td>
                                <td>
                                    {{ $course->description }}
                                </td>
                                <td>
                                    @foreach ($course->users as $user)
                                        <li>{{ $user->name }}</li>
                                    @endforeach
                                </td>
                                <td>
                                    {{ $course->created_at }}
                                </td>
                                <td>
                                    <a href="{{ route('courses.show',$course->id) }}" class="btn btn-secondary">View</a>
                                </td>
                                <td>
                                    <a href="{{ route('courses.edit',$course->id) }}" class="btn btn-secondary">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('courses.destroy', $course->id ) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-block btn-danger">Delete</button>
                                    </form>
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
