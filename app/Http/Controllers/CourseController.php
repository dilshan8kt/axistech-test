<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Http\Requests\StoredCourse;
use Auth;


class CourseController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->isAdmin){
            $courses = Course::with('users')->paginate(10);
        }else{
            $courses = Auth::user()->courses->paginate(10);
        }
        return view('courses.courses',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredCourse $request)
    {
        $validated = $request->validated();

        $course = new Course();
        $course->title          = $request->title;
        $course->description          = $request->description;
        $course->save();
        $request->session()->flash('message', 'Successfully created course');
        return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.show',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::findOrFail($id);

        return view('courses.edit',compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoredCourse $request, $id)
    {
        $validated = $request->validated();
        $course = Course::findOrFail($id);
        $course->title          = $request->title;
        $course->description          = $request->description;
        $course->save();
        $request->session()->flash('message', 'Course update successfully');
        return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::destroy($id);

        return redirect()->route('courses.index')->with('message', 'Course deleted');
    }

    
}
