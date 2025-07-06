<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfessorRequest;
use App\Models\Course;
use App\Models\Professor;

class ProfessorController extends Controller
{
    public function index()
    {
        $professors = Professor::all();
        return view('professors.index', compact('professors'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('professors.create', compact('courses'));
    }

    public function store(ProfessorRequest $request)
    {
        $professor = new Professor();
        $professor->name = $request->name;
        $professor->status = $request->status;

       if ($request->hasFile('image')) {
    $file = $request->file('image');

    $fileName = time() . '.' . $file->getClientOriginalExtension();

    $file->move(public_path('uploads/professors'), $fileName);

    $professor->image = 'uploads/professors/' . $fileName;
}


        $professor->country = $request->country;
        $professor->phone = $request->phone;
        $professor->address = $request->address;
        $professor->notes = $request->notes;
        $professor->save();

        

        return redirect()->route('professors.index')->with('success', 'تم إضافة المعلم بنجاح');
    }

    public function edit($id)
    {
        $courses = Course::all();
        $professor = Professor::findOrFail($id);
        return view('professors.edit', compact('professor', 'courses'));
    }

    public function update(ProfessorRequest $request, $id)
    {
        $professor = Professor::findOrFail($id);
        $professor->name = $request->name;
        $professor->status = $request->status;

        if ($request->hasFile('image')) {
    $file = $request->file('image');

    $fileName = time() . '.' . $file->getClientOriginalExtension();

    $file->move(public_path('uploads/professors'), $fileName);

    $professor->image = 'uploads/professors/' . $fileName;
}


        $professor->country = $request->country;
        $professor->phone = $request->phone;
        $professor->address = $request->address;
        $professor->notes = $request->notes;
        $professor->save();

       

        return redirect()->route('professors.index')->with('success', 'تم تحديث بيانات المعلم بنجاح');
    }

    public function destroy($id)
    {
        $professor = Professor::findOrFail($id);
        $professor->delete();
        return redirect()->route('professors.index')->with('success', 'تم حذف المعلم بنجاح');
    }

    public function show($id)
    {
        $professor = Professor::findOrFail($id);
        return view('professors.show', compact('professor'));
    }
}