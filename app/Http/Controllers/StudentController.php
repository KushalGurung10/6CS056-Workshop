<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        return view('student.list', compact('students'));
    }

    public function create()
    {
        $courses = Course::all();

        return view('student.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules());

        $student = Student::create($validated);

        if ($request->has('courses')) {
            $student->courses()->attach($request->courses);
        }

        return redirect()
            ->route('students.index')
            ->with('success', "Student {$student->name} created successfully!");
    }

    public function show(Student $student)
    {
        $student->load('courses');

        return view('student.detail', compact('student'));
    }

    public function edit(Student $student)
    {
        $courses = Course::all();
        $student->load('courses');

        return view('student.edit', compact('student', 'courses'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate($this->rules($student));

        $student->update($validated);

        $student->courses()->sync($request->courses ?? []);

        return redirect()
            ->route('students.show', $student)
            ->with('success', 'Student updated successfully!');
    }

    public function destroy(Student $student)
    {
        $student->courses()->detach();

        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }

    private function rules(?Student $student = null): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('students')->ignore($student?->id),
            ],
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:500',
            'date_of_birth' => 'nullable|date',
        ];
    }
}
