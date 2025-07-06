<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
class StudentController extends Controller
{
  public function index()
  {
    $courses = Course::all();
    $students = Student::with('courses')->get();

    return view('students.index', compact('students', 'courses'));
  }
  public function create()
  {
    $courses = Course::all();
    return view('students.create', compact('courses'));
  }
  public function store(StudentRequest $request)
  {
    $student = new Student();
    $student->name = $request->name;
    $student->status = $request->status;
    if ($request->hasFile('image')) {
      $file = $request->file('image');
      $fileName = $file->getClientOriginalName();
      $file->move(public_path('admin'), $fileName);
      $student->image = $fileName;
    }
    $student->country = $request->country;
    $student->phone = $request->phone;
    $student->address = $request->address;
    $student->notes = $request->notes;
    $student->created_at = now();
    $student->updated_at = now();
    
    $student->save();

    if ($request->has('courses')) {
      $student->courses()->sync($request->courses);
    }

    return redirect()->route('students.index')->with('success', 'تم إضافة الطالب بنجاح');
  }

  public function edit($id)
  {
    $courses = Course::all();
    $student = Student::findOrFail($id);
    return view('students.edit', compact('student', 'courses'));
  }
  public function update(StudentRequest $request, $id)
  {
    $student = Student::findOrFail($id);
    $student->name = $request->name;
    $student->status = $request->status;

    if ($request->hasFile('image')) {
      $file = $request->file('image');
      $fileName = $file->getClientOriginalName();
      $file->move(public_path('admin'), $fileName);
      $student->image = $fileName;
    }

    $student->country = $request->country;
    $student->phone = $request->phone;
    $student->address = $request->address;
    $student->notes = $request->notes;
    $student->updated_at = now();

    $student->save();

    // مزامنة الكورسات
    $student->courses()->sync($request->courses ?? []);

    return redirect()->route('students.index')->with('success', 'تم تحديث الطالب بنجاح');
  }


  public function destroy($id)
  {
    $student = Student::findOrFail($id);
    $student->delete();
    return redirect()->route('students.index')->with('success', 'تم حذف الطالب بنجاح');
  }
  public function show($id)
  {
    $student = Student::findOrFail($id);
    return view('students.show', compact('student'));
  }
}
