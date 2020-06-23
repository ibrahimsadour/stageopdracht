<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all()->toArray();

        // $students->orderByRaw("FIELD(prioriteit, 'Hoog', 'Normale', 'Laag')");

        // $students = Student::all()->orderByRaw("FIELD(prioriteit, 'Hoog', 'Normale', 'Laag')");

        $students = Student::orderBy('prioriteit')->get();


        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'titel'    =>  'required',
            'prioriteit'     =>  'required',
            'status'     =>  'required'
            
        ]);
        $student = new Student([
            'titel'    =>  $request->get('titel'),
            'prioriteit'     =>  $request->get('prioriteit'),
            'status'     =>  $request->get('status')
        ]);
        $student->save();
        return redirect()->route('student.index')->with('success', 'Data Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('student.edit', compact('student', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'titel'    =>  'required',
            'prioriteit'     =>  'required',
            'status'     =>  'required'
        ]);
        $student = Student::find($id);
        $student->titel = $request->get('titel');
        $student->prioriteit = $request->get('prioriteit');
        $student->status = $request->get('status');
        $student->save();
        return redirect()->route('student.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->route('student.index')->with('success', 'status is afgerond');
    }
}
