<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $student ['students'] = Student::OrderBy('id','asc')->paginate(5);

        return view('student.index', $student);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|min:3|string|max:255',
            'lastname' => 'required|min:3|string|max:255',
            'country' => 'required|min:3|string|max:255',
            'city' => 'required|min:3|string|max:255',
            'address' => 'required|min:3|string|max:255',
            'gender' => 'required|min:4|string|max:6'
        ]);

        $student = array(
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'country' => $request->country,
            'city' => $request->city,
            'address' => $request->address,
            'gender' => $request->gender
        );

        Student::create($student);

        return redirect()->route('student.index')->with('success','Student Inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'firstname' => 'required|min:3|string|max:255',
            'lastname' => 'required|min:3|string|max:255',
            'country' => 'required|min:3|string|max:255',
            'city' => 'required|min:3|string|max:255',
            'address' => 'required|min:3|string|max:255',
            'gender' => 'required|min:3|string|max:255'
        ]);

        $student = array(
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'country' => $request->country,
            'city' => $request->city,
            'address' => $request->address,
            'gender' => $request->gender
        );

        Student::findOrfail($request->student_id)->update($student );

        return redirect()->route('student.index')->with('success','Student Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $student)
    {
        $delete = $student->all();

        $delete_student = Student::findOrfail($student->student_id);
        $delete_student->delete();

        return redirect()->route('student.index')->with('success','Student Deleted Successfully');
    }
}
