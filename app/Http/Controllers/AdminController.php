<?php

namespace App\Http\Controllers;

use App\Rules\FullName;
use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

//    public function __construct(){
//        $this->middleware('guest');
//    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return $users
        if(Auth::user()){
            if(Auth::user()->role == 'user'){
                return redirect('/adminlogin');
            }else{
                $students= Student::all();
                return view('admin_dashboard',compact('students'));
            }
        }
        return redirect('/adminlogin');
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
        //
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
        $student = Student::findOrFail($id);
        return view('admin_edit',compact('student'));
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
//        $this->create($request);
        app('App\Http\Controllers\StudentController')->create($request);
        $student = Student::find($id);

        $student->email = $request->input('email');
        $student->fullname = $request->input('fullname');
        $student->mobile = $request->input('mobile');
        $student->nid = $request->input('nid');
        $student->address = $request->input('address');

        if ($request->hasFile('image')) {
            $file = $request->file('image') ;
            $ext = $file->getClientOriginalExtension() ;
            $filename = time() . '.' . $ext ;
            $file->move('uploads/images', $filename);
            $student->image = $filename ;
        }else {
            $student->image = Student::find($id)->image;
        }

        $student->save();

        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::destroy($id);
        return redirect('/admin');
    }

    public function check(Request $request){

//        if(Auth::attempt(['email'=> $request->input('email'), 'password' => $request->input('password') ,
//            'role'=>'superadmin'])){
//            return redirect('/admin');}
//            elseif(Auth::attempt(['email'=> $request->input('email'), 'password' => $request->input('password') ,
//                'role'=>'admin'])){
//                return redirect('/admin');
//            }elseif(Auth::attempt(['email'=> $request->input('email'), 'password' => $request->input('password') ,
//            'role'=>'user'])){
//            return redirect('/students');
//        }

        Auth::attempt(['email'=> $request->input('email'), 'password' => $request->input('password')],
            $request->input('remember'));

        if(Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin' ){
            return redirect('/admin');

        }elseif(Auth::user()->role == 'user'){

            return redirect('/students');
        }


            }
}
