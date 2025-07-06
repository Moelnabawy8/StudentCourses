<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
  public function index()
  {
    $courses =Course::all();
    return view('courses.index', compact('courses'));
  }
  public function create()
  {
    return view('courses.create');
  }
  public function store(CourseRequest $request)
  {
    $course = new Course();
    $course->name = $request->name;
    $course->status = $request->status; 
    $course->save();

    return redirect()->route('courses.index')->with('success', 'تم إضافة الكورس بنجاح');
  }
  public function edit($id)
  {
    $course = Course::findOrFail($id);
    return view('courses.edit', compact('course'));
  }
  public function update(CourseRequest $request, $id)
  {
    $course = Course::findOrFail($id);
    $course->name = $request->name;
    $course->status = $request->status;
    $course->save();
    return redirect()->route('courses.index')->with('success', 'تم تحديث الكورس بنجاح');
}
public function destroy($id)
  {
    $course = Course::findOrFail($id);
    $course->delete();
    return redirect()->route('courses.index')->with('success', 'تم حذف الكورس بنجاح');
  }
 public function show($id)
{
    $course = Course::with('students')->findOrFail($id);
    return view('courses.show', compact('course'));
}

}