<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use App\Rules\FullName;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
       return view('students',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($request)
    {
        $request->validate([
            'fullname' => ['required', new FullName()],
            'nid' => 'required|digits:10|numeric',
            'address' => 'required',
            'mobile' => 'required|digits:14|numeric',
            'email' => 'required|email',
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
        ]);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->create($request);
//        Student::create($request->all());

//        $student = new Student;
//        $student->fullname = $request->input('fullname');
//        $student->email = $request->input('email');
//        $student->mobile = $request->input('mobile');
//        $student->nid = $request->input('nid');
//        $student->address = $request->input('address');

        if ($request->file('image')) {
            $file = $request->file('image') ;
            $ext = $file->getClientOriginalExtension() ;
            $filename = time() . '.' . $ext ;
            $file->move('uploads/images', $filename);
//            $student->image = $filename ;
        }else{
            $filename = "defult.jpg";
        }
        Student::create([
            "fullname"    => $request->fullname,
            "email"       =>$request->email,
            "mobile"       =>$request->mobile,
            "address"     =>$request->address,
            "nid"         =>$request->nid,
            "image"       =>$filename,
        ]);

//        $student->save();
        return redirect('/students');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::where("id", $id)->get()->first();
        return view('studentpage',compact('student'));
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
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }


}
